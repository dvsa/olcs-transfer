<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

trait ExcludeLimitedReadOnlyOptional
{
    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Laminas\Filter\Boolean"})
     */
    protected $excludeLimitedReadOnly;

    public function getExcludeLimitedReadOnly()
    {
        return $this->excludeLimitedReadOnly;
    }
}
