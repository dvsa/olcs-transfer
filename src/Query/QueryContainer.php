<?php

/**
 * Query Container
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query;

use Zend\InputFilter\InputFilterInterface;
use Dvsa\Olcs\Transfer\Query\QueryInterface;

/**
 * Query Container
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
class QueryContainer implements QueryContainerInterface
{
    protected $routeName;

    protected $hasValidated = false;

    /**
     * @var InputFilterInterface
     */
    protected $inputFilter;

    /**
     * @var QueryInterface
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

    /**
     * Can the DTO be cached for short term
     *
     * @return bool
     */
    public function isShortTermCachable()
    {
        return ($this->dto instanceof CachableShortTermQueryInterface);
    }

    /**
     * Can the DTO be cached for medium term
     *
     * @return bool
     */
    public function isMediumTermCachable()
    {
        return ($this->dto instanceof CachableMediumTermQueryInterface);
    }

    /**
     * Get the identifier used to cache the DTO with
     *
     * @return string
     */
    public function getCacheIdentifier()
    {
        $dtoClassName = get_class($this->dto);
        $jsonData = json_encode($this->dto->getArrayCopy());

        return md5($dtoClassName . '-' . $jsonData);
    }

    public function setDto(QueryInterface $dto)
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
