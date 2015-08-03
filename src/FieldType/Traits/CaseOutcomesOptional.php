<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Case Outcomes
 */
trait CaseOutcomesOptional
{
    /**
     * @Transfer\ArrayInput
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\UniqueItems"})
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength","options":{"min":1,"max":32}})
     * @Transfer\Optional
     */
    protected $outcomes = null;

    /**
     * @return array
     */
    public function getOutcomes()
    {
        return $this->outcomes;
    }
}
