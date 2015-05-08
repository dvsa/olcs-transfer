<?php

/**
 * Query
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query;

use Zend\InputFilter\InputFilterInterface;
use Zend\Stdlib\ArraySerializableInterface;

/**
 * Query
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
class Query implements QueryInterface
{
    protected $routeName;

    protected $hasValidated = false;

    /**
     * @var InputFilterInterface
     */
    protected $inputFilter;

    /**
     * @var ArraySerializableInterface
     */
    protected $dto;

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        $this->inputFilter = $inputFilter;
    }

    public function getInputFilter()
    {
        return $this->inputFilter;
    }

    public function setDto(ArraySerializableInterface $dto)
    {
        $this->dto = $dto;
    }

    public function getDto()
    {
        return $this->dto;
    }

    public function setRouteName($routeName)
    {
        $this->routeName = $routeName;
    }

    public function getRouteName()
    {
        return $this->routeName;
    }

    public function isValid()
    {
        $this->hasValidated = true;

        $this->inputFilter->setData($this->dto->getArrayCopy());
        $this->dto->exchangeArray($this->inputFilter->getValues());

        return $this->inputFilter->isValid();
    }

    public function getMessages()
    {
        if ($this->hasValidated === false) {
            throw new \Exception('Validation has not yet occurred');
        }

        return $this->inputFilter->getMessages();
    }
}
