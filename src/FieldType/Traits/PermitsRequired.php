<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * PermitsRequired
 */
trait PermitsRequired
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    public $permitsRequired;

    /**
     * @return int
     */
    public function getPermitsRequired()
    {
        return $this->permitsRequired;
    }
}
