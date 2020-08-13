<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Placeholder
 * @author Andy Newton <andy@vitri.ltd>
 */
trait Placeholder
{
    /**
     * @var string
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Filter({"name":"Zend\Filter\StringToLower"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":255}})
     */
    protected $placeholder;

    /**
     * @return string
     */
    public function getPlaceholder()
    {
        return $this->placeholder;
    }
}
