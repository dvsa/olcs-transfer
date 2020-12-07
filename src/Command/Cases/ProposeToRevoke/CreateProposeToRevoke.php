<?php

/**
 * Create ProposeToRevoke
 */
namespace Dvsa\Olcs\Transfer\Command\Cases\ProposeToRevoke;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/propose-to-revoke")
 * @Transfer\Method("POST")
 */
final class CreateProposeToRevoke extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $case;

    /**
     * @Transfer\ArrayInput
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\FilterEmptyItems"})
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\UniqueItems"})
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $reasons = [];

    /**
     * @var int
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     */
    protected $assignedCaseworker = null;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $presidingTc;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\Date"})
     */
    protected $ptrAgreedDate;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\Date"})
     * @Transfer\Optional
     */
    protected $closedDate;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength", "options": {"min":5,"max":4000}})
     * @Transfer\Optional
     */
    protected $comment;

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
    public function getReasons()
    {
        return $this->reasons;
    }

    /**
     * Get the value of assignedCaseworker
     *
     * @return int
     */
    public function getAssignedCaseworker()
    {
        return $this->assignedCaseworker;
    }

    /**
     * @return mixed
     */
    public function getPresidingTc()
    {
        return $this->presidingTc;
    }

    /**
     * @return mixed
     */
    public function getPtrAgreedDate()
    {
        return $this->ptrAgreedDate;
    }

    /**
     * @return mixed
     */
    public function getClosedDate()
    {
        return $this->closedDate;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }
}
