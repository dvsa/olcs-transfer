<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Emissions
 */
trait Emissions
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $emissions;

    /**
     * @return int
     */
    public function getEmissions()
    {
        return $this->emissions;
    }
}
