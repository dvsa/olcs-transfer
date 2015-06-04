<?php

namespace Dvsa\Olcs\Transfer\Command\Cases\Complaint;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/complaint")
 * @Transfer\Method("POST")
 */
class CreateComplaint extends AbstractCommand
{
    /**
     * @Transfer\Validator({"name":"Zend\Validator\Digits ","options":{"min":1}})
     */
    protected $case = null;

    /**
     * isCompliance = true unless Environmental
     */
    public $isCompliance = true;

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
     * @param mixed $case
     * @return $this
     */
    public function setCase($case)
    {
        $this->case = $case;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCase()
    {
        return $this->case;
    }

    /**
     * @param mixed $vrm
     * @return $this
     */
    public function setVrm($vrm)
    {
        $this->vrm = $vrm;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVrm()
    {
        return $this->vrm;
    }

    /**
     * @param mixed $closedDate
     * @return $this
     */
    public function setClosedDate($closedDate)
    {
        $this->closedDate = $closedDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClosedDate()
    {
        return $this->closedDate;
    }

    /**
     * @param mixed $complainantFamilyName
     * @return $this
     */
    public function setComplainantFamilyName($complainantFamilyName)
    {
        $this->complainantFamilyName = $complainantFamilyName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getComplainantFamilyName()
    {
        return $this->complainantFamilyName;
    }

    /**
     * @param mixed $complainantForename
     * @return $this
     */
    public function setComplainantForename($complainantForename)
    {
        $this->complainantForename = $complainantForename;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getComplainantForename()
    {
        return $this->complainantForename;
    }

    /**
     * @param mixed $complaintDate
     * @return $this
     */
    public function setComplaintDate($complaintDate)
    {
        $this->complaintDate = $complaintDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getComplaintDate()
    {
        return $this->complaintDate;
    }

    /**
     * @param mixed $complaintType
     * @return $this
     */
    public function setComplaintType($complaintType)
    {
        $this->complaintType = $complaintType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getComplaintType()
    {
        return $this->complaintType;
    }

    /**
     * @param mixed $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $driverFamilyName
     * @return $this
     */
    public function setDriverFamilyName($driverFamilyName)
    {
        $this->driverFamilyName = $driverFamilyName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDriverFamilyName()
    {
        return $this->driverFamilyName;
    }

    /**
     * @param mixed $driverForename
     * @return $this
     */
    public function setDriverForename($driverForename)
    {
        $this->driverForename = $driverForename;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDriverForename()
    {
        return $this->driverForename;
    }

    /**
     * @param mixed $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }
}
