<?php

declare(strict_types=1);

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

trait IsInternalOptional
{
    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Laminas\Filter\Boolean"})
     */
    protected $isInternal;

    public function getIsInternal(): ?bool
    {
        return $this->isInternal;
    }
}
