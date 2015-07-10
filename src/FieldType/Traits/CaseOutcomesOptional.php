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
     * @Transfer\Validator(
     *  {
     *      "name":"Zend\Validator\InArray",
     *      "options": {"haystack": {"case_o_cua","case_o_cur","case_o_dun","case_o_gtd","case_o_imp","case_o_inc",
     *      "case_o_nfa","case_o_opr","case_o_pi","case_o_ptr","case_o_ref","case_o_rep","case_o_rev","case_o_sus",
     *      "case_o_war"}}
     *  }
     * )
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
