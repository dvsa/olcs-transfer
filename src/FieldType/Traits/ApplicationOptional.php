<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait ApplicationOptional
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Valtech <uk@valtech.co.uk>
 */
trait ApplicationOptional
{
    /**
     * @var int
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $application;

    /**
     * @return int
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * @param $applicationId Application ID
     */
    public function setApplication($applicationId)
    {
        $this->application = (int) $applicationId;
    }
}
