<?php

/**
 * Command Container
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command;

use Zend\InputFilter\InputFilterInterface;
use Dvsa\Olcs\Transfer\Command\CommandInterface;

/**
 * Command Container
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
class CommandContainer implements CommandContainerInterface
{
    protected $routeName;

    protected $method;

    protected $hasValidated = false;

    /**
     * @var InputFilterInterface
     */
    protected $inputFilter;

    /**
     * @var CommandInterface
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

    public function setDto(CommandInterface $dto)
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

    public function setMethod($method)
    {
        $this->method = $method;
    }

    public function getMethod()
    {
        return $this->method;
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
