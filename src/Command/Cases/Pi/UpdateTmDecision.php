<?php

namespace Dvsa\Olcs\Transfer\Command\Cases\Pi;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldType;

/**
 * @Transfer\RouteName("backend/pi/single/tm-decision")
 * @Transfer\Method("PUT")
 */
class UpdateTmDecision extends AbstractCommand
{
    use FieldType\Identity;
    use FieldType\Version;
    use FieldType\TrafficAreasOptional;
    use FieldType\PubTypeOptional;
    use FieldType\Witnesses;
    use FieldType\Publish;

    /**
     * @var int
     * @Transfer\Filter("Laminas\Filter\Digits")
     * @Transfer\Validator("Laminas\Validator\Digits")
     * @Transfer\Validator("Laminas\Validator\GreaterThan", options={"min": 0})
     */
    protected $decidedByTc;

    /**
     * @var String
     * @Transfer\Filter("Laminas\Filter\StringTrim")
     * @Transfer\Validator("Laminas\Validator\InArray",
     *     options={
     *          "haystack": {"tc_r_dhtru", "tc_r_dtc", "tc_r_htru", "tc_r_tc"}
     *      }
     * )
     */
    protected $decidedByTcRole;

    /**
     * @var int
     * @Transfer\ArrayInput
     * @Transfer\Filter("Laminas\Filter\Digits")
     * @Transfer\Validator("Laminas\Validator\Digits")
     * @Transfer\Validator("Laminas\Validator\GreaterThan", options={"min": 0})
     */
    protected $decisions = [];

    /**
     * @Transfer\Optional
     * @Transfer\Validator("Date", options={"format": "Y-m-d"})
     */
    protected $decisionDate;

    /**
     * @Transfer\Optional
     * @Transfer\Validator("Date", options={"format": "Y-m-d"})
     */
    protected $notificationDate;

    /**
     * @Transfer\Optional
     * @Transfer\Filter("Laminas\Filter\StringTrim")
     * @Transfer\Validator("Laminas\Validator\StringLength",options={"min":5,"max":4000})
     */
    protected $decisionNotes;

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
}
