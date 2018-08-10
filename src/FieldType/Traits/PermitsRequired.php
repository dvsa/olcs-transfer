<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * PermitsRequired
 */
trait PermitsRequired
{
    /**
     * @var int
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Between", "options": {"min": 1, "max": 999999}})
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
