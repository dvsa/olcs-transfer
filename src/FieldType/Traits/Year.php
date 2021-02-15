<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait Year
 */
trait Year
{
    /**
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $year;

    public function getYear()
    {
        return $this->year;
    }
}
