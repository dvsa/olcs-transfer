<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait Description
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Andy Newton <andy@vitri.ltd>
 */
trait Description
{
    /**
     * @var String
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min":1,"max":255}})
     */
    protected $description;

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
