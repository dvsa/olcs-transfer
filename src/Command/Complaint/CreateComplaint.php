<?php

namespace Dvsa\Olcs\Transfer\Command\Complaint;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/complaint")
 * @Transfer\Method("POST")
 */
class CreateComplaint extends AbstractCommand
{
    /**
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $case = null;

    /**
     * Always ct_complainant
     */
    protected $contactType = 'ct_complainant';

    /**
     * @Transfer\Optional()
     * @Transfer\Filter({"name":"Laminas\Filter\Boolean"})
     * @Transfer\Validator({"name":"Laminas\Validator\Identical", "options": {"token": true}})
     */
    protected $isCompliance = true;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength","options":{"min":2,"max":35}})
     */
    protected $complainantForename = null;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength","options":{"min":2,"max":35}})
     */
    protected $complainantFamilyName = null;

    /**
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     * @Transfer\Validator({"name":"\Dvsa\Olcs\Transfer\Validators\DateNotInFuture"})
     */
    protected $complaintDate = null;

    /**
     * @Transfer\Validator(
     *  {
     *      "name":"Laminas\Validator\InArray",
     *      "options": {"haystack": {"ct_cor","ct_cov","ct_dgm","ct_dsk","ct_fls","ct_lvu","ct_ndl","ct_nol","ct_olr",
     *      "ct_ovb","ct_pvo","ct_rds","ct_rta","ct_sln","ct_spe","ct_tgo","ct_ufl","ct_ump","ct_urd","ct_vpo"}}
     *  }
     * )
     */
    protected $complaintType = null;

    /**
     * @Transfer\Validator(
     *  {
     *      "name":"Laminas\Validator\InArray",
     *      "options": {"haystack": {"cs_ack","cs_pin","cs_rfs","cs_vfr","cs_yst"}}
     *  }
     * )
     */
    protected $status = null;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength","options":{"min":5,"max":4000}})
     */
    protected $description = null;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"\Dvsa\Olcs\Transfer\Filter\Vrm"})
     * @Transfer\Validator({"name":"\Dvsa\Olcs\Transfer\Validators\Vrm"})
     */
    protected $vrm = null;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength","options":{"min":2,"max":35}})
     */
    protected $driverForename = null;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength","options":{"min":2,"max":35}})
     */
    protected $driverFamilyName = null;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     * @Transfer\Validator({"name":"\Dvsa\Olcs\Transfer\Validators\DateNotInFuture"})
     */
    protected $closedDate = null;

    /**
     * @return mixed
     */
    public function getCase()
    {
        return $this->case;
    }

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

    /**
     * @return bool
     */
    public function getIsCompliance()
    {
        return $this->isCompliance;
    }
}
