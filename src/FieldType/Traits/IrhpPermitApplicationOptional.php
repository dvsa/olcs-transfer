<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * IRHP Permit Application Optional
 *
 * @package Dvsa\Olcs\Transfer\FieldType\Traits
 * @author Jonathan Thomas <jonathan@opalise.co.uk>
 */
trait IrhpPermitApplicationOptional
{
    /**
     * @Transfer\Optional
     * @Transfer\Validator("Laminas\Validator\Digits")
     * @Transfer\Validator("Laminas\Validator\GreaterThan", options={"min": 0})
     */
    protected ?int $irhpPermitApplication = null;

    /**
     * @return int|null
     */
    public function getIrhpPermitApplication(): ?int
    {
        return $this->irhpPermitApplication;
    }
}
