<?php


namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait IsTaOveridden
 *
 * @package Dvsa\Olcs\Transfer\FieldType\Traits
 */
trait IsTaOverridden
{

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y","N"}}})
     */
    protected $taIsOverridden;

    /**
     * @return string
     */
    public function getTaIsOverridden():?string
    {
        return $this->taIsOverridden;
    }
}
