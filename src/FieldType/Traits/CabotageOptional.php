<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * CabotageOptional
 */
trait CabotageOptional
{
    /**
     * @Transfer\Filter("Laminas\Filter\Digits")
     * @Transfer\Validator("Laminas\Validator\Digits")
     * @Transfer\Validator("Laminas\Validator\GreaterThan", options={"min": 0, "inclusive": true})
     * @Transfer\Optional
     */
    protected ?int $cabotage = null;

    public function getCabotage(): ?int
    {
        return $this->cabotage;
    }
}
