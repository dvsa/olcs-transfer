<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait Application
 *
 * @package Dvsa\Olcs\Transfer\FieldType\Traits
 * @author Valtech <uk@valtech.co.uk>
 */
trait Application
{
    /**
     * @var int
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
}
