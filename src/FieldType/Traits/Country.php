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
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options": {"min": 0, "max": 2}})
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
