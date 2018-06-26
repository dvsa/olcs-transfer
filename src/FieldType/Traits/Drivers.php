<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Drivers
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 */
trait Drivers
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name": "Zend\Validator\Between", "options": {"min":0, "max":99}})
     */
    protected $drivers;

    /**
     * @return int
     */
    public function getDrivers()
    {
        return $this->drivers;
    }
}
