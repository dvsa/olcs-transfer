<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * IRHP Permit Range Type
 *
 * @package Dvsa\Olcs\Transfer\FieldType\Traits
 */
trait IrhpPermitRangeTypeOptional
{
    /**
     * @Transfer\Optional
     * @Transfer\Filter("Laminas\Filter\StringTrim")
     * @Transfer\Validator("Laminas\Validator\InArray", options={"haystack": {"standard.single", "standard.multiple", "cabotage.single", "cabotage.multiple"}})
     */
    protected ?string $irhpPermitRangeType = null;

    public function getIrhpPermitRangeType(): ?string
    {
        return $this->irhpPermitRangeType;
    }
}
