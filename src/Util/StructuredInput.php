<?php

namespace Dvsa\Olcs\Transfer\Util;

use Laminas\InputFilter\InputFilterInterface;
use Laminas\InputFilter\InputInterface;
use Laminas\Filter\FilterChain;
use Laminas\Validator\ValidatorChain;
use Laminas\InputFilter\CollectionInputFilter;
use Laminas\InputFilter\EmptyContextInterface;

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

    /**
     * Construct
     *
     * @param string $name Name
     *
     * @return void
     */
    public function __construct($name = null)
    {
        $this->name = $name;
    }

    /**
     * Set allowEmpty
     *
     * @param bool $allowEmpty Allow empty
     *
     * @return void
     */
    public function setAllowEmpty($allowEmpty)
    {
        $this->allowEmpty = $allowEmpty;
    }

    /**
     * Set breakOnFailure
     *
     * @param bool $breakOnFailure Break on failure
     *
     * @return void
     */
    public function setBreakOnFailure($breakOnFailure)
    {
        $this->breakOnFailure = $breakOnFailure;
    }

    /**
     * Set errorMessage
     *
     * @param string $errorMessage Error message
     *
     * @return void
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
    }

    /**
     * Set filterChain
     *
     * @param \Laminas\Filter\FilterChain $filterChain Filter chain
     *
     * @return void
     */
    public function setFilterChain(FilterChain $filterChain)
    {
        $this->filterChain = $filterChain;
    }

    /**
     * Set name
     *
     * @param string $name Name
     *
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Set required
     *
     * @param bool $required Required
     *
     * @return void
     */
    public function setRequired($required)
    {
        $this->required = $required;
    }

    /**
     * Set validatorChain
     *
     * @param \Laminas\Validator\ValidatorChain $validatorChain Validator chain
     *
     * @return void
     */
    public function setValidatorChain(ValidatorChain $validatorChain)
    {
        $this->validatorChain = $validatorChain;
    }

    /**
     * Set value
     *
     * @param mixed $value Value
     *
     * @return void
     */
    public function setValue($value)
    {
        $this->setData($value);
    }

    /**
     * Merge
     *
     * @param \Laminas\InputFilter\InputInterface $input Value
     *
     * @return void
     */
    public function merge(InputInterface $input)
    {
        // no-op
    }

    /**
     * Get allowEmpty
     *
     * @return bool
     */
    public function allowEmpty()
    {
        return $this->allowEmpty;
    }

    /**
     * Get breakOnFailure
     *
     * @return bool
     */
    public function breakOnFailure()
    {
        return $this->breakOnFailure;
    }

    /**
     * Get errorMessage
     *
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * Get filterChain
     *
     * @return \Laminas\Filter\FilterChain
     */
    public function getFilterChain()
    {
        return $this->filterChain;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Is required
     *
     * @return bool
     */
    public function isRequired()
    {
        return $this->required;
    }

    /**
     * Get validatorChain
     *
     * @return \Laminas\Validator\ValidatorChain
     */
    public function getValidatorChain()
    {
        return $this->validatorChain;
    }

    /**
     * Add
     *
     * @param \Laminas\InputFilter\InputInterface $input Input
     * @param string                           $name  Name
     *
     * @return void
     */
    public function add($input, $name = null)
    {
        if ($name === null) {
            $name = $input->getName();
        }

        $this->inputs[$name] = $input;
    }

    /**
     * Get
     *
     * @param string $name Name
     *
     * @return \Laminas\InputFilter\InputInterface
     */
    public function get($name)
    {
        return $this->inputs[$name];
    }

    /**
     * Has
     *
     * @param string $name Name
     *
     * @return bool
     */
    public function has($name)
    {
        return isset($this->inputs[$name]);
    }

    /**
     * Remove
     *
     * @param string $name Name
     *
     * @return void
     */
    public function remove($name)
    {
        unset($this->inputs[$name]);
    }

    /**
     * Set data
     *
     * @param mixed $data Data
     *
     * @return void
     */
    public function setData($data)
    {
        $this->data = $data;
        $this->populate();
    }

    /**
     * Is valid
     *
     * @param mixed $context Context
     *
     * @return bool
     */
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

    /**
     * Set validationGroup
     *
     * @param string $name Name
     *
     * @return void
     */
    public function setValidationGroup($name)
    {
        // no-op
    }

    /**
     * Get invalidInputs
     *
     * @return array
     */
    public function getInvalidInput()
    {
        return $this->invalidInputs;
    }

    /**
     * Get validInputs
     *
     * @return array
     */
    public function getValidInput()
    {
        return $this->validInputs;
    }

    /**
     * Get value
     *
     * @param string $name Name
     *
     * @return mixed
     */
    public function getValue($name = null)
    {
        if ($name !== null) {
            return $this->inputs[$name]->getValue();
        }

        return $this->getValues();
    }

    /**
     * Get values
     *
     * @return array
     */
    public function getValues()
    {
        if (empty($this->data)) {
            return null;
        }

        $values = [];

        foreach ($this->inputs as $name => $input) {
            $values[$name] = $input->getValue();
        }

        $filterChain = $this->getFilterChain();

        $values = $filterChain->filter($values);

        return $values;
    }

    /**
     * Get raw value
     *
     * @param string $name Name
     *
     * @return mixed
     */
    public function getRawValue($name = null)
    {
        if ($name !== null) {
            return $this->inputs[$name]->getRawValue();
        }

        return $this->getRawValues();
    }

    /**
     * Get raw values
     *
     * @return array
     */
    public function getRawValues()
    {
        $values = [];

        foreach ($this->inputs as $name => $input) {
            $values[$name] = $input->getRawValue();
        }

        return $values;
    }

    /**
     * Get messages
     *
     * @return array
     */
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

    /**
     * Count
     *
     * @return int
     */
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
            $dataExists = is_array($data) && array_key_exists($name, $data);

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
