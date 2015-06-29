<?php

namespace Dvsa\Olcs\Transfer\Command\Partial;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * Application Tracking Partial
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
class ApplicationTracking
{
    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $id;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $version;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"0", "1", "2", "3"}}})
     */
    protected $addressesStatus;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"0", "1", "2", "3"}}})
     */
    protected $businessDetailsStatus;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"0", "1", "2", "3"}}})
     */
    protected $businessTypeStatus;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"0", "1", "2", "3"}}})
     */
    protected $communityLicencesStatus;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"0", "1", "2", "3"}}})
     */
    protected $conditionsUndertakingsStatus;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"0", "1", "2", "3"}}})
     */
    protected $convictionsPenaltiesStatus;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"0", "1", "2", "3"}}})
     */
    protected $discsStatus;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"0", "1", "2", "3"}}})
     */
    protected $financialEvidenceStatus;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"0", "1", "2", "3"}}})
     */
    protected $financialHistoryStatus;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"0", "1", "2", "3"}}})
     */


    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"0", "1", "2", "3"}}})
     */
    protected $licenceHistoryStatus;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"0", "1", "2", "3"}}})
     */
    protected $operatingCentresStatus;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"0", "1", "2", "3"}}})
     */
    protected $peopleStatus;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"0", "1", "2", "3"}}})
     */
    protected $safetyStatus;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"0", "1", "2", "3"}}})
     */
    protected $taxiPhvStatus;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"0", "1", "2", "3"}}})
     */
    protected $transportManagersStatus;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"0", "1", "2", "3"}}})
     */
    protected $typeOfLicenceStatus;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"0", "1", "2", "3"}}})
     */
    protected $undertakingsStatus;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"0", "1", "2", "3"}}})
     */
    protected $vehiclesDeclarationsStatus;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"0", "1", "2", "3"}}})
     */
    protected $vehiclesPsvStatus;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"0", "1", "2", "3"}}})
     */
    protected $vehiclesStatus;



    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Gets the value of version.
     *
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Gets the value of addressesStatus.
     *
     * @return mixed
     */
    public function getAddressesStatus()
    {
        return $this->addressesStatus;
    }

    /**
     * Gets the value of businessDetailsStatus.
     *
     * @return mixed
     */
    public function getBusinessDetailsStatus()
    {
        return $this->businessDetailsStatus;
    }

    /**
     * Gets the value of businessTypeStatus.
     *
     * @return mixed
     */
    public function getBusinessTypeStatus()
    {
        return $this->businessTypeStatus;
    }

    /**
     * Gets the value of communityLicencesStatus.
     *
     * @return mixed
     */
    public function getCommunityLicencesStatus()
    {
        return $this->communityLicencesStatus;
    }

    /**
     * Gets the value of conditionsUndertakingsStatus.
     *
     * @return mixed
     */
    public function getConditionsUndertakingsStatus()
    {
        return $this->conditionsUndertakingsStatus;
    }

    /**
     * Gets the value of convictionsPenaltiesStatus.
     *
     * @return mixed
     */
    public function getConvictionsPenaltiesStatus()
    {
        return $this->convictionsPenaltiesStatus;
    }

    /**
     * Gets the value of discsStatus.
     *
     * @return mixed
     */
    public function getDiscsStatus()
    {
        return $this->discsStatus;
    }

    /**
     * Gets the value of financialEvidenceStatus.
     *
     * @return mixed
     */
    public function getFinancialEvidenceStatus()
    {
        return $this->financialEvidenceStatus;
    }

    /**
     * Gets the value of financialHistoryStatus.
     *
     * @return mixed
     */
    public function getFinancialHistoryStatus()
    {
        return $this->financialHistoryStatus;
    }

    /**
     * Gets the value of licenceHistoryStatus.
     *
     * @return mixed
     */
    public function getLicenceHistoryStatus()
    {
        return $this->licenceHistoryStatus;
    }

    /**
     * Gets the value of operatingCentresStatus.
     *
     * @return mixed
     */
    public function getOperatingCentresStatus()
    {
        return $this->operatingCentresStatus;
    }

    /**
     * Gets the value of peopleStatus.
     *
     * @return mixed
     */
    public function getPeopleStatus()
    {
        return $this->peopleStatus;
    }

    /**
     * Gets the value of safetyStatus.
     *
     * @return mixed
     */
    public function getSafetyStatus()
    {
        return $this->safetyStatus;
    }

    /**
     * Gets the value of taxiPhvStatus.
     *
     * @return mixed
     */
    public function getTaxiPhvStatus()
    {
        return $this->taxiPhvStatus;
    }

    /**
     * Gets the value of transportManagersStatus.
     *
     * @return mixed
     */
    public function getTransportManagersStatus()
    {
        return $this->transportManagersStatus;
    }

    /**
     * Gets the value of typeOfLicenceStatus.
     *
     * @return mixed
     */
    public function getTypeOfLicenceStatus()
    {
        return $this->typeOfLicenceStatus;
    }

    /**
     * Gets the value of undertakingsStatus.
     *
     * @return mixed
     */
    public function getUndertakingsStatus()
    {
        return $this->undertakingsStatus;
    }

    /**
     * Gets the value of vehiclesDeclarationsStatus.
     *
     * @return mixed
     */
    public function getVehiclesDeclarationsStatus()
    {
        return $this->vehiclesDeclarationsStatus;
    }

    /**
     * Gets the value of vehiclesPsvStatus.
     *
     * @return mixed
     */
    public function getVehiclesPsvStatus()
    {
        return $this->vehiclesPsvStatus;
    }

    /**
     * Gets the value of vehiclesStatus.
     *
     * @return mixed
     */
    public function getVehiclesStatus()
    {
        return $this->vehiclesStatus;
    }
}