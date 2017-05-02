<?php

/**
 * Abstract Oc Command
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\ApplicationOperatingCentre;

use Dvsa\Olcs\Transfer\FieldType\Traits\Application;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * Abstract Oc Command
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
abstract class AbstractOcCommand extends AbstractCommand
{
    /**
     * @Transfer\Partial("Dvsa\Olcs\Transfer\Command\Partial\AddressOptionalPostcode")
     * @Transfer\Optional
     */
    protected $address;

    /**
     * @Transfer\Validator({"name": "Zend\Validator\Between", "options": {"min":0, "max":1000000}})
     */
    protected $noOfVehiclesRequired;

    /**
     * @Transfer\Validator({"name": "Zend\Validator\Between", "options": {"min":0, "max":1000000}})
     * @Transfer\Optional
     */
    protected $noOfTrailersRequired;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y","N"}}})
     * @Transfer\Optional
     */
    protected $sufficientParking;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y","N"}}})
     * @Transfer\Optional
     */
    protected $permission;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Between", "options": {"min": 0, "max": 2}})
     * @Transfer\Optional
     */
    protected $adPlaced;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Optional
     */
    protected $adPlacedIn;

    /**
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     * @Transfer\Optional
     */
    protected $adPlacedDate;

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return mixed
     */
    public function getNoOfVehiclesRequired()
    {
        return $this->noOfVehiclesRequired;
    }

    /**
     * @return mixed
     */
    public function getNoOfTrailersRequired()
    {
        return $this->noOfTrailersRequired;
    }

    /**
     * @return mixed
     */
    public function getSufficientParking()
    {
        return $this->sufficientParking;
    }

    /**
     * @return mixed
     */
    public function getPermission()
    {
        return $this->permission;
    }

    /**
     * @return mixed
     */
    public function getAdPlaced()
    {
        return $this->adPlaced;
    }

    /**
     * @return mixed
     */
    public function getAdPlacedIn()
    {
        return $this->adPlacedIn;
    }

    /**
     * @return mixed
     */
    public function getAdPlacedDate()
    {
        return $this->adPlacedDate;
    }
}
