<?php

/**
 * Update Interim
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Application;

use Dvsa\Olcs\Transfer\FieldType\Traits\Version;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;

/**
* @Transfer\RouteName("backend/application/single/interim")
* @Transfer\Method("PUT")
*/
class UpdateInterim extends AbstractCommand
{
    use Identity,
        Version;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     */
    protected $requested;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options": {"min": 1, "max": 1000}})
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
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 1, "inclusive": true}})
     * @Transfer\Optional
     */
    protected $authVehicles;

    /**
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0, "inclusive": true}})
     * @Transfer\Optional
     */
    protected $authTrailers;

    /**
     * @Transfer\ArrayInput
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $operatingCentres;

    /**
     * @Transfer\ArrayInput
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $vehicles;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *     "name":"Zend\Validator\InArray",
     *     "options": {
     *         "haystack": {
     *             "int_sts_requested",
     *             "int_sts_in_force",
     *             "int_sts_refused",
     *             "int_sts_revoked",
     *             "int_sts_granted"
     *         }
     *     }
     * })
     * @Transfer\Optional
     */
    protected $status;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"grant", "refuse"}}})
     * @Transfer\Optional
     */
    protected $action;

    /**
     * @return mixed
     */
    public function getRequested()
    {
        return $this->requested;
    }

    /**
     * @return mixed
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @return mixed
     */
    public function getAuthVehicles()
    {
        return $this->authVehicles;
    }

    /**
     * @return mixed
     */
    public function getAuthTrailers()
    {
        return $this->authTrailers;
    }

    /**
     * @return mixed
     */
    public function getOperatingCentres()
    {
        return $this->operatingCentres;
    }

    /**
     * @return mixed
     */
    public function getVehicles()
    {
        return $this->vehicles;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }
}
