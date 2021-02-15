<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Translate To Welsh Optional
 */
trait TranslateToWelshOptional
{
    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\YesNo"})
     * @Transfer\Optional
     */
    protected $translateToWelsh;

    /**
     * @return string
     */
    public function getTranslateToWelsh()
    {
        return $this->translateToWelsh;
    }
}
