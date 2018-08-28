<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * EcmtPermitApplicationLicence
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Andy Newton <andrew.newton@capgemini.com>
 */
trait EcmtApplicationAllOptional
{


    /**
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    public $id;

    public function getId()
    {
        return $this->id;
    }



    /**
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    public $licence;

    public function getLicence()
    {
        return $this->licence;
    }




    /**
     * @Transfer\Optional()
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    public $sectors;

    public function getSectors()
    {
        return $this->sectors;
    }

    /**
     *
     * @Transfer\Optional
     */
    protected $dateReceived;


    public function getDateReceived()
    {
        return $this->dateReceived;
    }


    /**
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": -1}})
     * @Transfer\Optional
     */
    public $noOfPermits;

    public function getNoOfPermits()
    {
        return $this->noOfPermits;
    }

    /**
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": -1}})
     * @Transfer\Optional
     */
    public $permitsRequired;

    public function getPermitsRequired()
    {
        return $this->permitsRequired;
    }


    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min":1, "max":32}})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"inter_journey_less_60", "inter_journey_60_90", "inter_journey_more_90"}}})
     * @Transfer\Optional
     */
    public $internationalJourneys;

    public function getInternationalJourneys()
    {
        return $this->internationalJourneys;
    }

    /**
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": -1}})
     * @Transfer\Optional
     */
    public $emissions;

    public function getEmissions()
    {
        return $this->emissions;
    }


    /**
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": -1}})
     * @Transfer\Optional
     */
    public $cabotage;

    public function getCabotage()
    {
        return $this->cabotage;
    }

    /**
     * @Transfer\Optional
     */
    protected $countryIds;

    public function getCountryIds()
    {
        return $this->countryIds;
    }


    /**
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": -1}})
     * @Transfer\Optional
     */
    public $trips;

    public function getTrips()
    {
        return $this->trips;
    }


    /**
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": -1}})
     * @Transfer\Optional
     */
    public $declaration;

    public function getDeclaration()
    {
        return $this->declaration;
    }


    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min":1, "max":32}})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"ecmt_permit_awaiting", "ecmt_permit_cancelled", "ecmt_permit_issued", "ecmt_permit_nys", "ecmt_permit_uc", "ecmt_permit_unsuccessful", "ecmt_permit_withdrawn"}}})
     * @Transfer\Optional
     */
    public $status;

    public function getStatus()
    {
        return $this->status;
    }


    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min":1, "max":255}})
     * @Transfer\Optional
     */
    public $permitType;

    public function getPermitType()
    {
        return $this->permitType;
    }
}
