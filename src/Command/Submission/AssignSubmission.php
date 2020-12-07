<?php

/**
 * AssignSubmission Submission
 */
namespace Dvsa\Olcs\Transfer\Command\Submission;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType as FieldType;

/**
 * @Transfer\RouteName("backend/submission/assign")
 * @Transfer\Method("PUT")
 */
final class AssignSubmission extends AbstractCommand
{
    // Identity & Locking
    use FieldType\Traits\Identity;
    use FieldType\Traits\Version;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $recipientUser;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     */
    protected $urgent;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\Date"})
     */
    protected $assignedDate;


    /**
     * @return mixed
     */
    public function getAssignedDate()
    {
        return $this->assignedDate;
    }


    /**
     * @return mixed
     */
    public function getRecipientUser()
    {
        return $this->recipientUser;
    }

    /**
     * @return mixed
     */
    public function getUrgent()
    {
        return $this->urgent;
    }
}
