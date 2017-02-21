<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait TransportManagerApplicationOptional
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 */
trait TransportManagerApplicationOptional
{
    /**
     * @var int
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $transportManagerApplication;

    /**
     * @return int
     */
    public function getTransportManagerApplication()
    {
        return $this->transportManagerApplication;
    }

    /**
     * @param int $transportManagerApplicationId
     */
    public function setTransportManagerApplication($transportManagerApplicationId)
    {
        $this->transportManagerApplication = (int) $transportManagerApplicationId;
    }
}
