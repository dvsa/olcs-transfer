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
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength","options":{"min":1,"max":32}})
     * @Transfer\Optional
     */
    protected $outcomes = [];

    /**
     * @return array
     */
    public function getOutcomes()
    {
        return $this->outcomes;
    }
}
