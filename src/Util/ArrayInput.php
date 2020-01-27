<?php

namespace Dvsa\Olcs\Transfer\Util;

use Zend\Filter\FilterChain;
use Zend\Validator\ValidatorChain;
use Zend\InputFilter\Input;

/**
 * Custom ArrayInput type which allows filters and validators on the whole array
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
class ArrayInput extends \Zend\InputFilter\ArrayInput
{
    protected $arrayFilterChain;

    protected $arrayValidatorChain;

    /**
     * @param  FilterChain $filterChain
     * @return Input
     */
    public function setArrayFilterChain(FilterChain $filterChain)
    {
        $this->arrayFilterChain = $filterChain;
        return $this;
    }

    /**
     * @return FilterChain
     */
    public function getArrayFilterChain()
    {
        return $this->arrayFilterChain;
    }

    /**
     * @param  ValidatorChain $validatorChain
     * @return Input
     */
    public function setArrayValidatorChain(ValidatorChain $validatorChain)
    {
        $this->arrayValidatorChain = $validatorChain;
        return $this;
    }

    /**
     * @return ValidatorChain
     */
    public function getArrayValidatorChain()
    {
        return $this->arrayValidatorChain;
    }

    /**
     * @return array
     */
    public function getValue()
    {
        $values = parent::getValue();

        // Apply array level filtering
        $arrayFilter = $this->getArrayFilterChain();
        $values = $arrayFilter->filter($values);

        return $values;
    }

    /**
     * @param  mixed $context Extra "context" to provide the validator
     * @return bool
     */
    public function isValid($context = null)
    {
        $values = $this->getValue();

        $arrayValidator = $this->getArrayValidatorChain();
        $result = $arrayValidator->isValid($values, $context);

        // If the whole array is valid, check the individual rules
        if ($result) {
            // TODO - OLCS-26136
            // return parent::isValid($context);
            return $this->isValidZendArrayInput($context);
        }

        return $result;
    }

    /**
     * @return array
     */
    public function getMessages()
    {
        $validator = $this->getArrayValidatorChain();
        return $validator->getMessages();
    }

    /**
     * @param  mixed $context Extra "context" to provide the validator
     * @return bool
     */
    private function isValidZendArrayInput($context = null)
    {
        // We should be using parent::isValid($context) but because of
        // https://github.com/zendframework/zend-inputfilter/commit/5a0859e4f520f66710713fa05b12d99f24b5da2a
        // some validation could potentially fail.
        // Below is a copy of \Zend\InputFilter\ArrayInput::isValid() method
        // with the potentially breaking code commented out and some logging added.
        // This method to be completely removed after some monitoring period.
        $hasValue = $this->hasValue();
        $required = $this->isRequired();
        $hasFallback = $this->hasFallback();

        if (! $hasValue && $hasFallback) {
            $this->setValue($this->getFallbackValue());
            return true;
        }

        if (! $hasValue && $required) {
            if ($this->errorMessage === null) {
                $this->errorMessage = $this->prepareRequiredValidationFailureMessage();
            }
            return false;
        }

        if (! $this->continueIfEmpty() && ! $this->allowEmpty()) {
            $this->injectNotEmptyValidator();
        }
        $validator = $this->getValidatorChain();
        $values    = $this->getValue();
        $result    = true;

        if ($required && empty($values)) {
            // if ($this->errorMessage === null) {
            //     $this->errorMessage = $this->prepareRequiredValidationFailureMessage();
            // }
            // return false;
            \Olcs\Logging\Log\Logger::warn('isValidZendArrayInput would fail on ZF2.5', ['name' => $this->getName(), 'values' => $values, 'context' => $context]);
        }

        foreach ($values as $value) {
            $empty = ($value === null || $value === '' || $value === []);
            if ($empty && ! $this->isRequired() && ! $this->continueIfEmpty()) {
                $result = true;
                continue;
            }
            if ($empty && $this->allowEmpty() && ! $this->continueIfEmpty()) {
                $result = true;
                continue;
            }
            $result = $validator->isValid($value, $context);
            if (! $result) {
                if ($hasFallback) {
                    $this->setValue($this->getFallbackValue());
                    return true;
                }
                break;
            }
        }

        return $result;
    }
}
