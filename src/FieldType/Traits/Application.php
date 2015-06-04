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
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
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
