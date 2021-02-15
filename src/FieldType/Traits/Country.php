<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Country
 * @author Andy Newton <andy@vitri.ltd>
 */
trait Country
{
    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Filter({"name":"Laminas\Filter\StringToUpper"})
     * @Transfer\Validator({"name":"Laminas\I18n\Validator\Alpha"})
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength", "options": {"min": 2, "max": 2}})
     */
    public $country;

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }
}
