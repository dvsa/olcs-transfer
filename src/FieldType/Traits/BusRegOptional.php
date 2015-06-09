<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait BusReg
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Valtech <uk@valtech.co.uk>
 */
trait BusRegOptional
{
    /**
     * @var int
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $busReg;

    /**
     * @return int
     */
    public function getBusReg()
    {
        return $this->busReg;
    }
}
