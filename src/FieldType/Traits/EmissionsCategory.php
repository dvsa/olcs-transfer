<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Emissions Category
 */
trait EmissionsCategory
{
    /**
     * @var String
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray","options":{"haystack":{"emissions_cat_euro6", "emissions_cat_euro5","emissions_cat_na"}}})
     */
    protected $emissionsCategory = [];

    /**
     * @return string
     */
    public function getEmissionsCategory()
    {
        return $this->emissionsCategory;
    }
}
