<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Country
 * @author Andy Newton <andy@vitri.ltd>
 */
trait Country
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Filter({"name":"Zend\Filter\StringToUpper"})
     * @Transfer\Validator({"name":"Zend\I18n\Validator\Alpha"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options": {"min": 2, "max": 2}})
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
