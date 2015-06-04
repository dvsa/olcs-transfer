<?php

/**
 * Bus stops
 */
namespace Dvsa\Olcs\Transfer\Command\Bus;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/bus/single/service-details")
 * @Transfer\Method("PUT")
 */
final class UpdateServiceDetails extends AbstractCommand
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
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":70}})
     */
    public $serviceNo;

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
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":800}})
     * @Transfer\Optional
     */
    public $otherDetails;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":800}})
     * @Transfer\Optional
     */
    public $receivedDate;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":800}})
     * @Transfer\Optional
     */
    public $effectiveDate;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":800}})
     * @Transfer\Optional
     */
    public $endDate;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    public $busNoticePeriod;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @return string
     */
    public function getServiceNo()
    {
        return $this->serviceNo;
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
     * @return mixed
     */
    public function getBusNoticePeriod()
    {
        return $this->busNoticePeriod;
    }


}
