<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Case Type
 */
trait CaseType
{
    /**
     * @var String
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator(
     *  {
     *      "name":"Zend\Validator\InArray",
     *      "options": {"haystack": {"case_t_app","case_t_imp","case_t_lic","case_t_tm"}}
     *  }
     * )
     */
    protected $caseType = null;

    /**
     * @return int
     */
    public function getCaseType()
    {
        return $this->caseType;
    }
}
