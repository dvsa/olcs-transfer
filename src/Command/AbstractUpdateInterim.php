<?php

namespace Dvsa\Olcs\Transfer\Command;

use Dvsa\Olcs\Transfer\FieldType\Traits\Version;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;

abstract class AbstractUpdateInterim extends AbstractCommand
{
    use Identity,
        Version;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     */
    protected $requested;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength", "options": {"min": 1, "max": 1000}})
     * @Transfer\Optional
     */
    protected $reason;

    /**
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\Date", "options":{"format": "Y-m-d"}})
     * @Transfer\Optional
     */
    protected $startDate;

    /**
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\Date", "options":{"format": "Y-m-d"}})
     * @Transfer\Optional
     */
    protected $endDate;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 1, "inclusive": true}})
     * @Transfer\Optional
     */
    protected $authVehicles;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0, "inclusive": true}})
     * @Transfer\Optional
     */
    protected $authTrailers;

    /**
     * @Transfer\ArrayInput
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $operatingCentres = [];

    /**
     * @Transfer\ArrayInput
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $vehicles = [];

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({
     *     "name":"Laminas\Validator\InArray",
     *     "options": {
     *         "haystack": {
     *             "int_sts_requested",
     *             "int_sts_in_force",
     *             "int_sts_refused",
     *             "int_sts_revoked",
     *             "int_sts_granted",
     *             "int_sts_ended"
     *         }
     *     }
     * })
     * @Transfer\Optional
     */
    protected $status;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\InArray", "options": {"haystack": {"grant", "refuse"}}})
     * @Transfer\Optional
     */
    protected $action;

    /**
     * Get requested
     *
     * @return string
     */
    public function getRequested()
    {
        return $this->requested;
    }

    /**
     * Get reason
     *
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Get start date
     *
     * @return string
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Get end date
     *
     * @return string
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Get auth vehicles
     *
     * @return int
     */
    public function getAuthVehicles()
    {
        return $this->authVehicles;
    }

    /**
     * Get auth trailers
     *
     * @return int
     */
    public function getAuthTrailers()
    {
        return $this->authTrailers;
    }

    /**
     * Get operating centres
     *
     * @return array
     */
    public function getOperatingCentres()
    {
        return $this->operatingCentres;
    }

    /**
     * Get vehicles
     *
     * @return array
     */
    public function getVehicles()
    {
        return $this->vehicles;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get action
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }
}
