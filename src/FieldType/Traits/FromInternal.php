<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * FromInternal
 */
trait FromInternal
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": -1}})
     */
    protected $fromInternal = 0;

    /**
     * @return int
     */
    public function getFromInternal()
    {
        return $this->fromInternal;
    }
}
