<?php

namespace Dvsa\Olcs\Transfer\Command\Cases\Opposition;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/opposition")
 * @Transfer\Method("PUT")
 */
class UpdateOpposition extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $id;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $version;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator(
     *  {
     *      "name":"Zend\Validator\InArray",
     *      "options": {"haystack": {"otf_eob", "otf_obj", "otf_rep"}}
     *  }
     * )
     */
    protected $oppositionType;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $raisedDate = null;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator(
     *  {
     *      "name":"Zend\Validator\InArray",
     *      "options": {"haystack": {"obj_t_local_auth", "obj_t_other", "obj_t_police", "obj_t_rta",
     *                  "obj_t_trade_union"}}
     *  }
     * )
     */
    protected $opposerType = null;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator(
     *  {
     *      "name":"Zend\Validator\InArray",
     *      "options": {"haystack": {"opp_v_yes","opp_v_no","opp_v_nd"}}
     *  }
     * )
     */
    protected $isValid;

    /**
     * @Transfer\Optional()
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength","options":{"max":4000}})
     */
    protected $validNotes;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator(
     *  {
     *      "name":"Zend\Validator\InArray",
     *      "options": {"haystack": {"Y","N"}}
     *  }
     * )
     */
    protected $isCopied;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator(
     *  {
     *      "name":"Zend\Validator\InArray",
     *      "options": {"haystack": {"Y","N"}}
     *  }
     * )
     */
    protected $isWillingToAttendPi;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator(
     *  {
     *      "name":"Zend\Validator\InArray",
     *      "options": {"haystack": {"Y","N"}}
     *  }
     * )
     */
    protected $isInTime;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator(
     *  {
     *      "name":"Zend\Validator\InArray",
     *      "options": {"haystack": {"Y","N"}}
     *  }
     * )
     */
    protected $isWithdrawn;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator(
     *  {
     *      "name":"Zend\Validator\InArray",
     *      "options": {"haystack": {"opp_ack","opp_cu_acc","opp_cu_prop","opp_cu_ref","opp_pro_rec"}}
     *  }
     * )
     */
    protected $status = null;

    /**
     * @Transfer\ArrayInput
     * @Transfer\Optional()
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $licenceOperatingCentres;

    /**
     * @Transfer\ArrayInput
     * @Transfer\Optional()
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $applicationOperatingCentres;

    /**
     * @Transfer\ArrayInput
     * @Transfer\Optional()
     * @Transfer\Validator(
     *  {
     *      "name":"Zend\Validator\InArray",
     *      "options": {"haystack": {"ogf_both","ogf_env","ogf_fin_stan","ogf_fitness","ogf_fumes","ogf_noise","ogf_o",
     *      "ogf_o_ccap","ogf_parking","ogf_pollution","ogf_prof_com","ogf_repute","ogf_safety","ogf_size",
     *      "ogf_unsochrs","ogf_cib","ogf_vis"}}
     *  }
     * )
     */
    protected $grounds = null;

    /**
     * @Transfer\Optional()
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength","options":{"max":4000}})
     */
    protected $notes = null;

    /**
     * @Transfer\Partial("Dvsa\Olcs\Transfer\Command\Partial\ContactDetails")
     * @Transfer\Optional
     */
    protected $opposerContactDetails;

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
    public function getApplicationOperatingCentres()
    {
        return $this->applicationOperatingCentres;
    }

    /**
     * @return mixed
     */
    public function getGrounds()
    {
        return $this->grounds;
    }

    /**
     * @return mixed
     */
    public function getIsCopied()
    {
        return $this->isCopied;
    }

    /**
     * @return mixed
     */
    public function getIsInTime()
    {
        return $this->isInTime;
    }

    /**
     * @return mixed
     */
    public function getIsValid()
    {
        return $this->isValid;
    }

    /**
     * @return mixed
     */
    public function getIsWillingToAttendPi()
    {
        return $this->isWillingToAttendPi;
    }

    /**
     * @return mixed
     */
    public function getIsWithdrawn()
    {
        return $this->isWithdrawn;
    }

    /**
     * @return mixed
     */
    public function getLicenceOperatingCentres()
    {
        return $this->licenceOperatingCentres;
    }

    /**
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @return mixed
     */
    public function getOpposerContactDetails()
    {
        return $this->opposerContactDetails;
    }

    /**
     * @return mixed
     */
    public function getOpposerType()
    {
        return $this->opposerType;
    }

    /**
     * @return mixed
     */
    public function getOppositionType()
    {
        return $this->oppositionType;
    }

    /**
     * @return mixed
     */
    public function getRaisedDate()
    {
        return $this->raisedDate;
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
    public function getValidNotes()
    {
        return $this->validNotes;
    }
}
