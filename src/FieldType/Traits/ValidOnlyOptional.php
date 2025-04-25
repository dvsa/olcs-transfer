<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Valid only
 *
 * @package Dvsa\Olcs\Transfer\FieldType\Traits
 */
trait ValidOnlyOptional
{
    /**
     * @Transfer\Filter("Laminas\Filter\Boolean")
     * @Transfer\Optional
     */
    protected ?bool $validOnly = null;

    public function getValidOnly(): ?bool
    {
        return $this->validOnly;
    }
}
