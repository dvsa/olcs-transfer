<?php

/**
 * Update IrfoPsvAuth
 */
namespace Dvsa\Olcs\Transfer\Command\Irfo;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/irfo/psv-auth/single")
 * @Transfer\Method("PUT")
 */
final class UpdateIrfoPsvAuth extends AbstractCommand
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
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $irfoPsvAuthType;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"irfo_auth_s_approved","irfo_auth_s_cns","irfo_auth_s_granted","irfo_auth_s_pending","irfo_auth_s_refused","irfo_auth_s_renew","irfo_auth_s_withdrawn"}}})
     */
    protected $status;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $validityPeriod;

    /**
     * @Transfer\ArrayInput
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\FilterEmptyItems"})
     * @Transfer\Partial("Dvsa\Olcs\Transfer\Command\Partial\IrfoPsvAuthNumber")
     * @Transfer\Optional
     */
    protected $irfoPsvAuthNumbers;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\Date"})
     */
    protected $inForceDate;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\Date"})
     * @Transfer\Optional
     */
    protected $expiryDate;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\Date"})
     * @Transfer\Optional
     */
    protected $applicationSentDate;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options": {"min":1,"max":30}})
     */
    protected $serviceRouteFrom;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options": {"min":1,"max":30}})
     */
    protected $serviceRouteTo;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"psv_freq_daily","psv_freq_2_weekly","psv_freq_weekly","psv_freq_fortnight","psv_freq_monthly","psv_freq_other"}}})
     */
    protected $journeyFrequency;

    /**
     * @Transfer\ArrayInput
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\FilterEmptyItems"})
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\UniqueItems"})
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min": 1}})
     * @Transfer\Optional
     */
    protected $countrys;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     * @Transfer\Optional
     */
    protected $isFeeExemptApplication;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     * @Transfer\Optional
     */
    protected $isFeeExemptAnnual;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options": {"max":255}})
     * @Transfer\Optional
     */
    protected $exemptionDetails;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0, "inclusive":true}})
     */
    protected $copiesRequired;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0, "inclusive":true}})
     */
    protected $copiesRequiredTotal;

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
    public function getIrfoPsvAuthType()
    {
        return $this->irfoPsvAuthType;
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
    public function getValidityPeriod()
    {
        return $this->validityPeriod;
    }

    /**
     * @return mixed
     */
    public function getIrfoPsvAuthNumbers()
    {
        return $this->irfoPsvAuthNumbers;
    }

    /**
     * @return mixed
     */
    public function getInForceDate()
    {
        return $this->inForceDate;
    }

    /**
     * @return mixed
     */
    public function getExpiryDate()
    {
        return $this->expiryDate;
    }

    /**
     * @return mixed
     */
    public function getApplicationSentDate()
    {
        return $this->applicationSentDate;
    }

    /**
     * @return mixed
     */
    public function getServiceRouteFrom()
    {
        return $this->serviceRouteFrom;
    }

    /**
     * @return mixed
     */
    public function getServiceRouteTo()
    {
        return $this->serviceRouteTo;
    }

    /**
     * @return mixed
     */
    public function getJourneyFrequency()
    {
        return $this->journeyFrequency;
    }

    /**
     * @return mixed
     */
    public function getCountrys()
    {
        return $this->countrys;
    }

    /**
     * @return mixed
     */
    public function getIsFeeExemptApplication()
    {
        return $this->isFeeExemptApplication;
    }

    /**
     * @return mixed
     */
    public function getIsFeeExemptAnnual()
    {
        return $this->isFeeExemptAnnual;
    }

    /**
     * @return mixed
     */
    public function getExemptionDetails()
    {
        return $this->exemptionDetails;
    }

    /**
     * @return mixed
     */
    public function getCopiesRequired()
    {
        return $this->copiesRequired;
    }

    /**
     * @return mixed
     */
    public function getCopiesRequiredTotal()
    {
        return $this->copiesRequiredTotal;
    }
}
