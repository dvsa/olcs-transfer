<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * EcmtTrips
 */
trait EcmtTrips
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $ecmtTrips;

    /**
     * @return int
     */
    public function getEcmtTrips()
    {
        return $this->ecmtTrips;
    }
}
