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
