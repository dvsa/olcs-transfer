<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * FromInternal
 */
trait FromInternal
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": -1}})
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
