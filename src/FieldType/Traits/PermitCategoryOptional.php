<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Permit Category Optional
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Jonathan Thomas <jonathan@opalise.co.uk>
 */
trait PermitCategoryOptional
{
    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength", "options":{"min":1, "max":32}})
     * @Transfer\Validator({"name":"Laminas\Validator\InArray", "options": {"haystack": {"permit_cat_standard_multiple_15", "permit_cat_standard_single", "permit_cat_empty_entry", "permit_cat_hors_contingent"}}})
     * @Transfer\Optional
     */
    public $permitCategory;

    public function getPermitCategory()
    {
        return $this->permitCategory;
    }
}
