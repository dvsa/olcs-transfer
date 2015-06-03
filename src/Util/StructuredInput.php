<?php

namespace Dvsa\Olcs\Transfer\Util;

use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputInterface;
use Zend\Filter\FilterChain;
use Zend\Validator\ValidatorChain;
use Zend\InputFilter\CollectionInputFilter;
use Zend\InputFilter\EmptyContextInterface;

/**
 * Structured Input (Kind of a mashup between an Input and InputFilter)
 * - Manages validation and filtering on nested inputs whilst also allowing validation and filtering on itself
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
class StructuredInput implements InputInterface, InputFilterInterface
{
    /**
     * @var bool
     */
    protected $allowEmpty = false;

    /**
     * @var bool
     */
    protected $continueIfEmpty = false;

    /**
     * @var bool
     */
    protected $breakOnFailure = false;

    /**
     * @var string|null
     */
    protected $errorMessage;

    /**
     * @var FilterChain
     */
    protected $filterChain;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var bool
     */
    protected $notEmptyValidator = false;

    /**
     * @var bool
     */
    protected $required = true;

    /**
     * @var ValidatorChain
     */
    protected $validatorChain;

    /**
     * @var mixed
     */
    protected $data;

    /**
     * @var mixed
     */
    protected $fallbackValue;

    /**
     * @var bool
     */
    protected $hasFallback = false;

    protected $inputs = [];

    protected $invalidInputs;

    protected $validationGroup;

    protected $validInputs;

    protected $messages;

    public function __construct($name = null)
    {
        $this->name = $name;
    }

    public function setAllowEmpty($allowEmpty)
    {
        $this->allowEmpty = $allowEmpty;
    }

    public function setBreakOnFailure($breakOnFailure)
    {
        $this->breakOnFailure = $breakOnFailure;
    }

    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
    }

    public function setFilterChain(FilterChain $filterChain)
    {
        $this->filterChain = $filterChain;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setRequired($required)
    {
        $this->required = $required;
    }

    public function setValidatorChain(ValidatorChain $validatorChain)
    {
        $this->validatorChain = $validatorChain;
    }

    public function setValue($value)
    {
        $this->setData($value);
    }

    public function merge(InputInterface $input)
    {
        // no-op
    }

    public function allowEmpty()
    {
        return $this->allowEmpty;
    }

    public function breakOnFailure()
    {
        return $this->breakOnFailure;
    }

    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    public function getFilterChain()
    {
        return $this->filterChain;
    }

    public function getName()
    {
        return $this->name;
    }

    public function isRequired()
    {
        return $this->required;
    }

    public function getValidatorChain()
    {
        return $this->validatorChain;
    }

    public function add($input, $name = null)
    {
        if ($name === null) {
            $name = $input->getName();
        }

        $this->inputs[$name] = $input;
    }

    public function get($name)
    {
        return $this->inputs[$name];
    }

    public function has($name)
    {
        return isset($this->inputs[$name]);
    }

    public function remove($name)
    {
        unset($this->inputs[$name]);
    }

    public function setData($data)
    {
        $this->data = $data;
        $this->populate();
    }

    public function isValid($context = null)
    {
        if (empty($this->data) && !$this->isRequired()) {
            return true;
        }

        $validatorChain = $this->getValidatorChain();

        if ($validatorChain->isValid($this->getValue(), $context)) {
            return $this->validateInputs();
        } else {
            $this->messages = $validatorChain->getMessages();
            return false;
        }
    }

    public function setValidationGroup($name)
    {
        // no-op
    }

    public function getInvalidInput()
    {
        return $this->invalidInputs;
    }

    public function getValidInput()
    {
        return $this->validInputs;
    }

    public function getValue($name = null)
    {
        if ($name !== null) {
            return $this->inputs[$name]->getValue();
        }

        return $this->getValues();
    }

    public function getValues()
    {
        if (empty($this->data)) {
            return null;
        }

        $values = [];

        foreach($this->inputs as $name => $input) {
            $values[$name] = $input->getValue();
        }

        $filterChain = $this->getFilterChain();

        $values = $filterChain->filter($values);

        return $values;
    }

    public function getRawValue($name = null)
    {
        if ($name !== null) {
            return $this->inputs[$name]->getRawValue();
        }

        return $this->getRawValues();
    }

    public function getRawValues()
    {
        $values = [];

        foreach($this->inputs as $name => $input) {
            $values[$name] = $input->getRawValue();
        }

        return $values;
    }

    public function getMessages()
    {
        if ($this->messages !== null) {
            return $this->messages;
        }

        $messages = array();
        foreach ($this->getInvalidInput() as $name => $input) {
            $messages[$name] = $input->getMessages();
        }

        return $messages;
    }

    public function count()
    {
        return count($this->inputs);
    }

    /**
     * Populate the values of all attached inputs
     *
     * @return void
     */
    protected function populate()
    {
        foreach ($this->inputs as $name => $input) {

            if ($input instanceof CollectionInputFilter) {
                $input->clearValues();
                $input->clearRawValues();
            }

            if (!isset($this->data[$name])) {
                // No value; clear value in this input
                if ($input instanceof InputFilterInterface) {
                    $input->setData(array());
                    continue;
                }

                if ($input instanceof ArrayInput) {
                    $input->setValue(array());
                    continue;
                }

                $input->setValue(null);
                continue;
            }

            $value = $this->data[$name];

            if ($input instanceof InputFilterInterface) {
                $input->setData($value);
                continue;
            }

            $input->setValue($value);
        }
    }

    /**
     * Validate a set of inputs against the current data
     *
     * @param  array $inputs
     * @param  array $data
     * @return bool
     */
    protected function validateInputs()
    {
        // backwards compatibility
        $data = $this->getValues();

        $this->validInputs   = array();
        $this->invalidInputs = array();
        $valid               = true;

        foreach ($this->inputs as $name => $input) {
            $dataExists = array_key_exists($name, $data);

            // key doesn't exist, but input is not required; valid
            if (!$dataExists && $input instanceof InputInterface && !$input->isRequired()) {
                $this->validInputs[$name] = $input;
                continue;
            }

            // key doesn't exist, input is required, allows empty; valid if
            // continueIfEmpty is false or input doesn't implement
            // that interface; otherwise validation chain continues
            if (!$dataExists && $input instanceof InputInterface && $input->isRequired() && $input->allowEmpty()) {
                if (!($input instanceof EmptyContextInterface && $input->continueIfEmpty())) {
                    $this->validInputs[$name] = $input;
                    continue;
                }
            }

            // key exists, is null, input is not required; valid
            if ($dataExists && null === $data[$name] && $input instanceof InputInterface && !$input->isRequired()) {
                $this->validInputs[$name] = $input;
                continue;
            }

            // key exists, is null, input is required, allows empty; valid if
            // continueIfEmpty is false or input doesn't implement
            // that interface; otherwise validation chain continues
            if ($dataExists && null === $data[$name] && $input instanceof InputInterface && $input->isRequired()
                && $input->allowEmpty()
            ) {
                if (!($input instanceof EmptyContextInterface && $input->continueIfEmpty())) {
                    $this->validInputs[$name] = $input;
                    continue;
                }
            }

            // key exists, empty string, input is not required, allows empty; valid
            if ($dataExists && '' === $data[$name] && $input instanceof InputInterface && !$input->isRequired()
                && $input->allowEmpty()
            ) {
                $this->validInputs[$name] = $input;
                continue;
            }

            // key exists, empty string, input is required, allows empty; valid
            // if continueIfEmpty is false, otherwise validation continues
            if ($dataExists && '' === $data[$name] && $input instanceof InputInterface && $input->isRequired()
                && $input->allowEmpty()
            ) {
                if (!($input instanceof EmptyContextInterface && $input->continueIfEmpty())) {
                    $this->validInputs[$name] = $input;
                    continue;
                }
            }

            // make sure we have a value (empty) for validation
            if (!$dataExists) {
                $data[$name] = null;
            }

            // Validate an input filter
            if ($input instanceof InputFilterInterface) {
                if (!$input->isValid()) {
                    $this->invalidInputs[$name] = $input;
                    $valid = false;
                    continue;
                }
                $this->validInputs[$name] = $input;
                continue;
            }

            // Validate an input
            if ($input instanceof InputInterface) {
                if (!$input->isValid($data)) {
                    // Validation failure
                    $this->invalidInputs[$name] = $input;
                    $valid = false;

                    if ($input->breakOnFailure()) {
                        return false;
                    }
                    continue;
                }
                $this->validInputs[$name] = $input;
                continue;
            }
        }

        return $valid;
    }
}
