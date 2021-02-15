<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait SubmissionOptional
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Valtech <uk@valtech.co.uk>
 */
trait SubmissionOptional
{
    /**
     * @var int
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $submission;

    /**
     * @return int
     */
    public function getSubmission()
    {
        return $this->submission;
    }
}
