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
        return (int) $this->id;
    }



    /**
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    public $licence;

    public function getLicence()
    {
        return (int) $this->licence;
    }




    /**
     * @Transfer\Optional()
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    public $sectors;

    public function getSectors()
    {
        return (int) $this->sectors;
    }

    /**
     *
     * @Transfer\Optional
     * @var \DateTime
     * @Transfer\Validator({"name":"Zend\Validator\Date", "options": {"format": "Y-m-d"}})
     */
    protected $dateReceived;


    /**
     * @return \DateTime
     */
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
        return (int) $this->noOfPermits;
    }

    /**
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": -1}})
     * @Transfer\Optional
     */
    public $permitsRequired;

    public function getPermitsRequired()
    {
        return (int) $this->permitsRequired;
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
        return (int) $this->emissions;
    }


    /**
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": -1}})
     * @Transfer\Optional
     */
    public $cabotage;

    public function getCabotage()
    {
        return (int) $this->cabotage;
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
        return (int) $this->trips;
    }


    /**
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": -1}})
     * @Transfer\Optional
     */
    public $declaration;

    public function getDeclaration()
    {
        return (int) $this->declaration;
    }


    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min":1, "max":32}})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"permit_app_awaiting", "permit_app_cancelled", "permit_app_issued", "permit_app_nys", "permit_app_uc", "permit_app_unsuccessful", "permit_app_withdrawn"}}})
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
