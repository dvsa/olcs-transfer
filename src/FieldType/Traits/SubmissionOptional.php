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
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
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
