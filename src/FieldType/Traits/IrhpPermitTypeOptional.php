<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * IRHP Permit Type Trait
 *
 * @package Dvsa\Olcs\Transfer\FieldType\Traits
 */
trait IrhpPermitTypeOptional
{
    /**
     * @Transfer\Optional
     * @Transfer\Filter("Laminas\Filter\StringTrim")
     * @Transfer\Validator("Laminas\Validator\Between",
     *      options={
     *          "min": 0,
     *          "max": 99999
     *      }
     * )
     */
    protected ?int $irhpPermitType;

    public function getIrhpPermitType(): ?int
    {
        return $this->irhpPermitType;
    }
}
