<?php

namespace Dvsa\Olcs\Transfer\Command\TransportManagerApplication;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/transport-manager-application/single/update-details")
 * @Transfer\Method("PUT")
 */
final class UpdateDetails extends AbstractCommand
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
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Optional
     */
    protected $email;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Optional
     */
    protected $placeOfBirth;

    /**
     * @Transfer\Partial("Dvsa\Olcs\Transfer\Command\Partial\AddressOptional")
     */
    protected $homeAddress;

    /**
     * @Transfer\Partial("Dvsa\Olcs\Transfer\Command\Partial\AddressOptional")
     */
    protected $workAddress;

    /**
     * @Transfer\ArrayInput
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $operatingCentres = [];

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"tm_t_i","tm_t_e"}}})
     * @Transfer\Optional
     */
    protected $tmType;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y","N"}}})
     * @Transfer\Optional
     */
    protected $isOwner;

    /**
     * @Transfer\Filter({"name":"Zend\I18n\Filter\NumberFormat"})
     * @Transfer\Validator({"name":"Zend\I18n\Validator\IsFloat"})
     * @Transfer\Optional
     */
    protected $hoursMon;

    /**
     * @Transfer\Filter({"name":"Zend\I18n\Filter\NumberFormat"})
     * @Transfer\Validator({"name":"Zend\I18n\Validator\IsFloat"})
     * @Transfer\Optional
     */
    protected $hoursTue;

    /**
     * @Transfer\Filter({"name":"Zend\I18n\Filter\NumberFormat"})
     * @Transfer\Validator({"name":"Zend\I18n\Validator\IsFloat"})
     * @Transfer\Optional
     */
    protected $hoursWed;

    /**
     * @Transfer\Filter({"name":"Zend\I18n\Filter\NumberFormat"})
     * @Transfer\Validator({"name":"Zend\I18n\Validator\IsFloat"})
     * @Transfer\Optional
     */
    protected $hoursThu;

    /**
     * @Transfer\Filter({"name":"Zend\I18n\Filter\NumberFormat"})
     * @Transfer\Validator({"name":"Zend\I18n\Validator\IsFloat"})
     * @Transfer\Optional
     */
    protected $hoursFri;

    /**
     * @Transfer\Filter({"name":"Zend\I18n\Filter\NumberFormat"})
     * @Transfer\Validator({"name":"Zend\I18n\Validator\IsFloat"})
     * @Transfer\Optional
     */
    protected $hoursSat;

    /**
     * @Transfer\Filter({"name":"Zend\I18n\Filter\NumberFormat"})
     * @Transfer\Validator({"name":"Zend\I18n\Validator\IsFloat"})
     * @Transfer\Optional
     */
    protected $hoursSun;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Optional
     */
    protected $additionalInfo;

    /**
     * @Transfer\Validator({"name":"Zend\Validator\Date", "options": {"format": "Y-m-d"}})
     * @Transfer\Optional
     */
    protected $dob;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y","N"}}})
     * @Transfer\Optional
     */
    protected $submit;

    /**
     * Get Transport Manager Application ID
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get Version
     *
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Get Email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get Place of Birth
     *
     * @return string
     */
    public function getPlaceOfBirth()
    {
        return $this->placeOfBirth;
    }

    /**
     * Get Home Address
     *
     * @return \Dvsa\Olcs\Transfer\Command\Partial\AddressOptional
     */
    public function getHomeAddress()
    {
        return $this->homeAddress;
    }

    /**
     * Get Work Address
     *
     * @return \Dvsa\Olcs\Transfer\Command\Partial\AddressOptional
     */
    public function getWorkAddress()
    {
        return $this->workAddress;
    }

    /**
     * Get Operating Centres
     *
     * @return array
     */
    public function getOperatingCentres()
    {
        return $this->operatingCentres;
    }

    /**
     * Get Transport manager Type
     *
     * @return string
     */
    public function getTmType()
    {
        return $this->tmType;
    }

    /**
     * Is Owner
     *
     * @return string
     */
    public function getIsOwner()
    {
        return $this->isOwner;
    }

    /**
     * Hours at Monday
     *
     * @return int
     */
    public function getHoursMon()
    {
        return $this->hoursMon;
    }

    /**
     * Hours at Tuesday
     *
     * @return int
     */
    public function getHoursTue()
    {
        return $this->hoursTue;
    }

    /**
     * Hours at Wednesday
     *
     * @return int
     */
    public function getHoursWed()
    {
        return $this->hoursWed;
    }

    /**
     * Hours at Thuesday
     *
     * @return int
     */
    public function getHoursThu()
    {
        return $this->hoursThu;
    }

    /**
     * Hours at Friday
     *
     * @return int
     */
    public function getHoursFri()
    {
        return $this->hoursFri;
    }

    /**
     * Hours at Saturday
     *
     * @return int
     */
    public function getHoursSat()
    {
        return $this->hoursSat;
    }

    /**
     * Hours at Sunday
     *
     * @return int
     */
    public function getHoursSun()
    {
        return $this->hoursSun;
    }

    /**
     * Get Additional Info
     *
     * @return string
     */
    public function getAdditionalInfo()
    {
        return $this->additionalInfo;
    }

    /**
     * Get submit
     *
     * @return string
     */
    public function getSubmit()
    {
        return $this->submit;
    }

    /**
     * Get date of birth
     *
     * @return string
     */
    public function getDob()
    {
        return $this->dob;
    }
}
