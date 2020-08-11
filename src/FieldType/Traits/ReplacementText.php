<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait ReplacementText
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Andy Newton <andy@vitri.ltd>
 */
trait ReplacementText
{
    /**
     * @var String
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":2048}})
     */
    protected $replacementText;

    /**
     * @return string
     */
    public function getReplacementText()
    {
        return $this->replacementText;
    }
}
