<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait BusReg
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Valtech <uk@valtech.co.uk>
 */
trait BusReg
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
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
