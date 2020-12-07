<?php

namespace Dvsa\Olcs\Transfer\Util;

use Laminas\Filter\FilterChain;
use Laminas\Validator\ValidatorChain;
use Laminas\InputFilter\Input;

/**
 * Custom ArrayInput type which allows filters and validators on the whole array
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
class ArrayInput extends \Laminas\InputFilter\ArrayInput
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
            return parent::isValid($context);
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
}
