<?php

declare(strict_types=1);

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

trait ExcludeLimitedReadOnlyOptional
{
    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Laminas\Filter\Boolean"})
     */
    protected $excludeLimitedReadOnly;

    public function getExcludeLimitedReadOnly(): ?bool
    {
        return $this->excludeLimitedReadOnly;
    }
}
