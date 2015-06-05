<?php

namespace Dvsa\Olcs\Transfer\Command\Cases\Complaint;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/complaint")
 * @Transfer\Method("POST")
 */
class UpdateComplaint extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength","options":{"min":2,"max":35}})
     */
    public $complainantForename = null;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength","options":{"min":2,"max":35}})
     */
    public $complainantFamilyName = null;

    /**
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     * @Transfer\Validator({"name": "\Common\Form\Elements\Validators\DateNotInFuture"})
     */
    public $complaintDate = null;

    /**
     * @Transfer\Optional()
     */
    public $complaintType = null;

    /**
     * @to-do add validators
     */
    public $status = null;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator({"name":"Zend\Validator\StringLength","options":{"min":5,"max":4000}})
     */
    public $description = null;

    /**
     * @Transfer\Optional()
     * @Transfer\Filter({"name":"Common\Filter\Vrm"})
     * @Transfer\Validator({"name":"Common\Form\Elements\Validators\Vrm"})
     */
    public $vrm = null;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator({"name":"Zend\Validator\StringLength","options":{"min":2,"max":35}})
     */
    public $driverForename = null;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator({"name":"Zend\Validator\StringLength","options":{"min":2,"max":35}})
     */
    public $driverFamilyName = null;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    public $closedDate = null;

    /**
     * @return mixed
     */
    public function getVrm()
    {
        return $this->vrm;
    }

    /**
     * @return mixed
     */
    public function getClosedDate()
    {
        return $this->closedDate;
    }

    /**
     * @return mixed
     */
    public function getComplainantFamilyName()
    {
        return $this->complainantFamilyName;
    }

    /**
     * @return mixed
     */
    public function getComplainantForename()
    {
        return $this->complainantForename;
    }

    /**
     * @return mixed
     */
    public function getComplaintDate()
    {
        return $this->complaintDate;
    }

    /**
     * @return mixed
     */
    public function getComplaintType()
    {
        return $this->complaintType;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getDriverFamilyName()
    {
        return $this->driverFamilyName;
    }

    /**
     * @return mixed
     */
    public function getDriverForename()
    {
        return $this->driverForename;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }
}
