<?php

/**
 * Bus stops
 */
namespace Dvsa\Olcs\Transfer\Command\Bus;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldType;

/**
 * @Transfer\RouteName("backend/bus/single/service-details")
 * @Transfer\Method("PUT")
 */
final class UpdateServiceDetails extends AbstractCommand
{
    use FieldType\Identity;
    use FieldType\Version;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":70}})
     * @Transfer\Optional
     */
    public $serviceNo;

    /**
     * @Transfer\ArrayInput
     * @Transfer\Optional
     */
    public $otherServices = [];

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":100}})
     * @Transfer\Optional
     */
    public $startPoint;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":100}})
     * @Transfer\Optional
     */
    public $finishPoint;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":255}})
     * @Transfer\Optional
     */
    public $via;

    /**
     * @Transfer\ArrayInput
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\UniqueItems"})
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $busServiceTypes = [];

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":800}})
     * @Transfer\Optional
     */
    public $otherDetails;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     * @Transfer\Optional
     */
    public $receivedDate;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     * @Transfer\Optional
     */
    public $effectiveDate;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     * @Transfer\Optional
     */
    public $endDate;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    public $busNoticePeriod;

    /**
     * @return string
     */
    public function getServiceNo()
    {
        return $this->serviceNo;
    }

    /**
     * @return array
     */
    public function getOtherServices()
    {
        return $this->otherServices;
    }

    /**
     * @return string
     */
    public function getStartPoint()
    {
        return $this->startPoint;
    }

    /**
     * @return string
     */
    public function getFinishPoint()
    {
        return $this->finishPoint;
    }

    /**
     * @return string
     */
    public function getVia()
    {
        return $this->via;
    }

    /**
     * @return array
     */
    public function getBusServiceTypes()
    {
        return $this->busServiceTypes;
    }

    /**
     * @return string
     */
    public function getOtherDetails()
    {
        return $this->otherDetails;
    }

    /**
     * @return string
     */
    public function getReceivedDate()
    {
        return $this->receivedDate;
    }

    /**
     * @return string
     */
    public function getEffectiveDate()
    {
        return $this->effectiveDate;
    }

    /**
     * @return string
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @return int
     */
    public function getBusNoticePeriod()
    {
        return $this->busNoticePeriod;
    }
}
