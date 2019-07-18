<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait Year (optional)
 */
trait YearOptional
{
    /**
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $year;

    public function getYear()
    {
        return (int) $this->year;
    }
}
