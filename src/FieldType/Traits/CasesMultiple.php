<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Ids
 */
trait CasesMultiple
{
    /**
     * @Transfer\ArrayInput
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $casesMultiple = [];

    /**
     * @return array
     */
    public function getCasesMultiple()
    {
        return $this->casesMultiple;
    }
}
