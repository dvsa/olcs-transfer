<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Translated Text Optional
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Andy Newton <andy@vitri.ltd>
 */
trait TranslatedTextOptional
{
    /**
     * @var String
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":1024}})
     */
    protected $translatedText;

    /**
     * @return string
     */
    public function getTranslatedText()
    {
        return $this->translatedText;
    }
}
