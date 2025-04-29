<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Translate To Welsh Optional
 */
trait TranslateToWelshOptional
{
    /**
     * @Transfer\Filter("Laminas\Filter\StringTrim")
     * @Transfer\Validator("Dvsa\Olcs\Transfer\Validators\YesNo")
     * @Transfer\Optional
     */
    protected ?string $translateToWelsh = null;

    public function getTranslateToWelsh(): ?string
    {
        return $this->translateToWelsh;
    }
}
