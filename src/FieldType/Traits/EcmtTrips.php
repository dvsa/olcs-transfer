<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * EcmtTrips
 */
trait EcmtTrips
{
    /**
     * @var int
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
