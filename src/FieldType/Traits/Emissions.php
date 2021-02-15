<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Emissions
 */
trait Emissions
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
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
