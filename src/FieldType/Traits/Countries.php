<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Countries
 */
trait Countries
{
    /**
     * @Transfer\ArrayInput
     * @Transfer\ArrayValidator({"name":"Zend\Validator\NotEmpty"})
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\UniqueItems"})
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options": {"min": 2, "max": 2}})
     */
    protected $countries = [];

    /**
     * @return array
     */
    public function getCountries()
    {
        return $this->countries;
    }
}
