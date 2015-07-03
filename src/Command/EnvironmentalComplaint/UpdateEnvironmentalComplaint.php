<?php

namespace Dvsa\Olcs\Transfer\Command\EnvironmentalComplaint;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/environmental-complaint/single")
 * @Transfer\Method("PUT")
 */
class UpdateEnvironmentalComplaint extends AbstractCommand
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $id = null;

    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $version = null;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength","options":{"min":2,"max":35}})
     */
    protected $complainantForename = null;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength","options":{"min":2,"max":35}})
     */
    protected $complainantFamilyName = null;

    /**
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $complaintDate = null;

    /**
     * @Transfer\Validator(
     *  {
     *      "name":"Zend\Validator\InArray",
     *      "options": {"haystack": {"ct_cor","ct_cov","ct_dgm","ct_dsk","ct_fls","ct_lvu","ct_ndl","ct_nol","ct_olr",
     *      "ct_ovb","ct_pvo","ct_rds","ct_rta","ct_sln","ct_spe","ct_tgo","ct_ufl","ct_ump","ct_urd","ct_vpo"}}
     *  }
     * )
     */
    protected $complaintType = null;

    /**
     * @Transfer\Validator(
     *  {
     *      "name":"Zend\Validator\InArray",
     *      "options": {"haystack": {"cs_ack","cs_pin","cs_rfs","cs_vfr","cs_yst"}}
     *  }
     * )
     */
    protected $status = null;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator({"name":"Zend\Validator\StringLength","options":{"min":5,"max":4000}})
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
     * @Transfer\Validator({"name":"Zend\Validator\StringLength","options":{"min":2,"max":35}})
     */
    protected $driverForename = null;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator({"name":"Zend\Validator\StringLength","options":{"min":2,"max":35}})
     */
    protected $driverFamilyName = null;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $closedDate = null;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
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
}
