<?php

namespace Dvsa\Olcs\Transfer\Command\Cases\Pi;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldType;

/**
 * @Transfer\RouteName("backend/pi/single/decision")
 * @Transfer\Method("PUT")
 */
class UpdateDecision extends AbstractCommand
{
    use FieldType\Identity;
    use FieldType\Version;
    use FieldType\TrafficAreasOptional;
    use FieldType\PubTypeOptional;

    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $decidedByTc;

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
    protected $decidedByTcRole;

    /**
     * @var int
     * @Transfer\ArrayInput
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $decisions;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     */
    protected $licenceRevokedAtPi;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     */
    protected $licenceSuspendedAtPi;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     */
    protected $licenceCurtailedAtPi;

    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     */
    protected $witnesses;

    /**
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $decisionDate;

    /**
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $notificationDate;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength","options":{"min":5,"max":4000}})
     */
    protected $decisionNotes;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     */
    protected $publish;

    /**
     * @return int
     */
    public function getDecidedByTc()
    {
        return $this->decidedByTc;
    }

    /**
     * @return String
     */
    public function getDecidedByTcRole()
    {
        return $this->decidedByTcRole;
    }

    /**
     * @return array
     */
    public function getDecisions()
    {
        return $this->decisions;
    }

    /**
     * @return mixed
     */
    public function getLicenceRevokedAtPi()
    {
        return $this->licenceRevokedAtPi;
    }

    /**
     * @return mixed
     */
    public function getLicenceSuspendedAtPi()
    {
        return $this->licenceSuspendedAtPi;
    }

    /**
     * @return mixed
     */
    public function getLicenceCurtailedAtPi()
    {
        return $this->licenceCurtailedAtPi;
    }

    /**
     * @return int
     */
    public function getWitnesses()
    {
        return $this->witnesses;
    }

    /**
     * @return mixed
     */
    public function getDecisionDate()
    {
        return $this->decisionDate;
    }

    /**
     * @return mixed
     */
    public function getNotificationDate()
    {
        return $this->notificationDate;
    }

    /**
     * @return mixed
     */
    public function getDecisionNotes()
    {
        return $this->decisionNotes;
    }

    /**
     * @return mixed
     */
    public function getPublish()
    {
        return $this->publish;
    }
}
