<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Countries
 */
trait Countries
{
    /**
     * @Transfer\ArrayInput
     * @Transfer\ArrayValidator({"name":"Laminas\Validator\NotEmpty"})
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\UniqueItems"})
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength", "options": {"min": 2, "max": 2}})
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
