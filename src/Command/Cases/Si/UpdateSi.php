<?php

namespace Dvsa\Olcs\Transfer\Command\Cases\Si;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldType;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/case-si/single")
 * @Transfer\Method("PUT")
 */
class UpdateSi extends AbstractCommand
{
    use FieldType\Identity;
    use FieldType\Version;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":36}})
     * @Transfer\Optional
     */
    protected $notificationNumber = null;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $siCategoryType;

    /**
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     * @Transfer\Validator({"name":"\Dvsa\Olcs\Transfer\Validators\DateNotInFuture"})
     */
    protected $infringementDate;

    /**
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     * @Transfer\Validator({"name":"\Dvsa\Olcs\Transfer\Validators\DateNotInFuture"})
     */
    protected $checkDate;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min":2, "max":2}})
     */
    protected $memberStateCode;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":5000}})
     * @Transfer\Optional
     */
    protected $reason = null;

    /**
     * @return string
     */
    public function getNotificationNumber()
    {
        return $this->notificationNumber;
    }

    /**
     * @return int
     */
    public function getSiCategoryType()
    {
        return $this->siCategoryType;
    }

    /**
     * @return string
     */
    public function getInfringementDate()
    {
        return $this->infringementDate;
    }

    /**
     * @return string
     */
    public function getCheckDate()
    {
        return $this->checkDate;
    }

    /**
     * @return string
     */
    public function getMemberStateCode()
    {
        return $this->memberStateCode;
    }

    /**
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }
}
