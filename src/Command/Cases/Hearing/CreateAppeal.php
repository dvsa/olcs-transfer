<?php

namespace Dvsa\Olcs\Transfer\Command\Cases\Hearing;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/appeal")
 * @Transfer\Method("POST")
 */
class CreateAppeal extends AbstractCommand
{
    /**
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $case = null;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $deadlineDate = null;

    /**
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $appealDate = null;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength","options":{"min":2,"max":20}})
     */
    protected $appealNo = null;

    /**
     * @Transfer\Validator(
     *  {
     *      "name":"Laminas\Validator\InArray",
     *      "options": {
     *          "haystack": {
     *              "appeal_r_app","appeal_r_lic_non_pi","appeal_r_lic_pi","appeal_r_tm_non_pi","appeal_r_tm_pi"
     *          }
     *      }
     *  }
     * )
     */
    protected $reason = null;

    /**
     * @Transfer\Optional()
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength","options":{"min":5,"max":4000}})
     */
    protected $outlineGround = null;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $hearingDate = null;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $decisionDate = null;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $papersDueDate = null;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $papersDueTcDate = null;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $papersSentDate = null;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $papersSentTcDate = null;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator(
     *  {
     *      "name":"Laminas\Validator\InArray",
     *      "options": {"haystack": {"appeal_o_dis","appeal_o_pas","appeal_o_ref","appeal_o_suc"}}
     *  }
     * )
     */
    protected $outcome = null;

    /**
     * @Transfer\Optional()
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength","options":{"min":5,"max":4000}})
     */
    protected $comment = null;

    /**
     * @Transfer\Optional
     * @Transfer\Validator(
     *  {
     *      "name":"Laminas\Validator\InArray",
     *      "options": {"haystack": {"Y","N"}}
     *  }
     * )
     */
    protected $isWithdrawn = null;

    /**
     * @Transfer\Optional
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $withdrawnDate = null;

    /**
     * @Transfer\Optional
     * @Transfer\Validator(
     *  {
     *      "name":"Laminas\Validator\InArray",
     *      "options": {"haystack": {"Y","N"}}
     *  }
     * )
     */
    protected $dvsaNotified = null;

    /**
     * @return mixed
     */
    public function getCase()
    {
        return $this->case;
    }

    /**
     * @return mixed
     */
    public function getAppealDate()
    {
        return $this->appealDate;
    }

    /**
     * @return mixed
     */
    public function getAppealNo()
    {
        return $this->appealNo;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @return mixed
     */
    public function getDeadlineDate()
    {
        return $this->deadlineDate;
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
    public function getHearingDate()
    {
        return $this->hearingDate;
    }

    /**
     * @return mixed
     */
    public function getIsWithdrawn()
    {
        return $this->isWithdrawn;
    }

    /**
     * @return mixed
     */
    public function getOutcome()
    {
        return $this->outcome;
    }

    /**
     * @return mixed
     */
    public function getOutlineGround()
    {
        return $this->outlineGround;
    }

    /**
     * @return mixed
     */
    public function getPapersDueDate()
    {
        return $this->papersDueDate;
    }

    /**
     * @return mixed
     */
    public function getPapersSentDate()
    {
        return $this->papersSentDate;
    }

    /**
     * @return mixed
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @return mixed
     */
    public function getWithdrawnDate()
    {
        return $this->withdrawnDate;
    }

    /**
     * @return mixed
     */
    public function getDvsaNotified()
    {
        return $this->dvsaNotified;
    }

    /**
     * @return mixed
     */
    public function getPapersDueTcDate()
    {
        return $this->papersDueTcDate;
    }

    /**
     * @return mixed
     */
    public function getPapersSentTcDate()
    {
        return $this->papersSentTcDate;
    }
}
