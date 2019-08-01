<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait Year
 */
trait Year
{
    /**
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $year;

    public function getYear()
    {
        return $this->year;
    }
}
