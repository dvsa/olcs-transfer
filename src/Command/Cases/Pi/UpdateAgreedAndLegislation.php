<?php

namespace Dvsa\Olcs\Transfer\Command\Cases\Pi;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldType;

/**
 * @Transfer\RouteName("backend/pi/single/agreed")
 * @Transfer\Method("PUT")
 */
class UpdateAgreedAndLegislation extends AbstractCommand
{
    use FieldType\Identity;
    use FieldType\Version;
    use FieldType\CommentOptional;

    /**
     * @var string
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $agreedDate;

    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $agreedByTc;

    /**
     * @var String
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *     "name":"Zend\Validator\InArray",
     *     "options": {
     *          "haystack": {"tc_r_dhtru", "tc_r_dtc", "tc_r_htru", "tc_r_tc"}
     *      }
     * })
     */
    protected $agreedByTcRole;

    /**
     * @var int
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $assignedCaseworker;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     */
    protected $isEcmsCase = null;

    /**
     * @var string
     * @Transfer\Optional
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $ecmsFirstReceivedDate;

    /**
     * @Transfer\ArrayInput
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\UniqueItems"})
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength","options":{"min":1,"max":32}})
     */
    protected $piTypes = [];

    /**
     * @Transfer\ArrayInput
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\UniqueItems"})
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $reasons = [];

    /**
     * @return string
     */
    public function getAgreedDate()
    {
        return $this->agreedDate;
    }

    /**
     * @return int
     */
    public function getAgreedByTc()
    {
        return $this->agreedByTc;
    }

    /**
     * @return string
     */
    public function getAgreedByTcRole()
    {
        return $this->agreedByTcRole;
    }

    /**
     * @return int
     */
    public function getAssignedCaseworker()
    {
        return $this->assignedCaseworker;
    }

    /**
     * @return string
     */
    public function getIsEcmsCase()
    {
        return $this->isEcmsCase;
    }

    /**
     * @return string
     */
    public function getEcmsFirstReceivedDate()
    {
        return $this->ecmsFirstReceivedDate;
    }

    /**
     * @return array
     */
    public function getPiTypes()
    {
        return $this->piTypes;
    }

    /**
     * @return array
     */
    public function getReasons()
    {
        return $this->reasons;
    }
}
