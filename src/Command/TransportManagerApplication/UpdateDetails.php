<?php

namespace Dvsa\Olcs\Transfer\Command\TransportManagerApplication;

use Dvsa\Olcs\Transfer\FieldType\Traits;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/transport-manager-application/single/update-details")
 * @Transfer\Method("PUT")
 */
final class UpdateDetails extends AbstractCommand
{
    use Traits\Identity,
        Traits\Version;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Optional
     */
    protected $email;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Optional
     */
    protected $placeOfBirth;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength", "options": {"min": 7, "max": 7}})
     * @Transfer\Optional
     */
    protected $lgvAcquiredRightsReferenceNumber;

    /**
     * @Transfer\Partial("Dvsa\Olcs\Transfer\Command\Partial\AddressOptional")
     */
    protected $homeAddress;

    /**
     * @Transfer\Partial("Dvsa\Olcs\Transfer\Command\Partial\AddressOptional")
     */
    protected $workAddress;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\InArray", "options": {"haystack": {"tm_t_i","tm_t_e"}}})
     * @Transfer\Optional
     */
    protected $tmType;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\InArray", "options": {"haystack": {"Y","N"}}})
     * @Transfer\Optional
     */
    protected $isOwner;

    /**
     * @Transfer\Filter({"name":"Laminas\I18n\Filter\NumberFormat"})
     * @Transfer\Validator({"name":"Laminas\I18n\Validator\IsFloat"})
     * @Transfer\Optional
     */
    protected $hoursMon;

    /**
     * @Transfer\Filter({"name":"Laminas\I18n\Filter\NumberFormat"})
     * @Transfer\Validator({"name":"Laminas\I18n\Validator\IsFloat"})
     * @Transfer\Optional
     */
    protected $hoursTue;

    /**
     * @Transfer\Filter({"name":"Laminas\I18n\Filter\NumberFormat"})
     * @Transfer\Validator({"name":"Laminas\I18n\Validator\IsFloat"})
     * @Transfer\Optional
     */
    protected $hoursWed;

    /**
     * @Transfer\Filter({"name":"Laminas\I18n\Filter\NumberFormat"})
     * @Transfer\Validator({"name":"Laminas\I18n\Validator\IsFloat"})
     * @Transfer\Optional
     */
    protected $hoursThu;

    /**
     * @Transfer\Filter({"name":"Laminas\I18n\Filter\NumberFormat"})
     * @Transfer\Validator({"name":"Laminas\I18n\Validator\IsFloat"})
     * @Transfer\Optional
     */
    protected $hoursFri;

    /**
     * @Transfer\Filter({"name":"Laminas\I18n\Filter\NumberFormat"})
     * @Transfer\Validator({"name":"Laminas\I18n\Validator\IsFloat"})
     * @Transfer\Optional
     */
    protected $hoursSat;

    /**
     * @Transfer\Filter({"name":"Laminas\I18n\Filter\NumberFormat"})
     * @Transfer\Validator({"name":"Laminas\I18n\Validator\IsFloat"})
     * @Transfer\Optional
     */
    protected $hoursSun;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Optional
     */
    protected $additionalInfo;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\InArray", "options": {"haystack": {"Y","N"}}})
     * @Transfer\Optional
     */
    protected $hasOtherLicences;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\InArray", "options": {"haystack": {"Y","N"}}})
     * @Transfer\Optional
     */
    protected $hasOtherEmployment;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\InArray", "options": {"haystack": {"Y","N"}}})
     * @Transfer\Optional
     */
    protected $hasConvictions;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\InArray", "options": {"haystack": {"Y","N"}}})
     * @Transfer\Optional
     */
    protected $hasPreviousLicences;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\InArray", "options": {"haystack": {"Y","N"}}})
     * @Transfer\Optional
     */
    protected $hasUndertakenTraining;

    /**
     * @Transfer\Validator({"name":"Laminas\Validator\Date", "options": {"format": "Y-m-d"}})
     * @Transfer\Optional
     */
    protected $dob;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\InArray", "options": {"haystack": {"Y","N"}}})
     * @Transfer\Optional
     */
    protected $submit;

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
     * Get LGV Acquired Rights Reference Number
     *
     * @return string
     */
    public function getLgvAcquiredRightsReferenceNumber()
    {
        return $this->lgvAcquiredRightsReferenceNumber;
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
     * Get Tm Type
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
     * @return string
     */
    public function getHasOtherLicences()
    {
        return $this->hasOtherLicences;
    }

    /**
     * @return string
     */
    public function getHasOtherEmployment()
    {
        return $this->hasOtherEmployment;
    }

    /**
     * @return string
     */
    public function getHasConvictions()
    {
        return $this->hasConvictions;
    }

    /**
     * @return string
     */
    public function getHasPreviousLicences()
    {
        return $this->hasPreviousLicences;
    }

    /**
     * @return ?string
     */
    public function getHasUndertakenTraining(): ?string
    {
        return $this->hasUndertakenTraining;
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
