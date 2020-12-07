<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait TaskOptional
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Valtech <uk@valtech.co.uk>
 */
trait TaskOptional
{
    /**
     * @var int
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $task;

    /**
     * @return int
     */
    public function getTask()
    {
        return $this->task;
    }
}
