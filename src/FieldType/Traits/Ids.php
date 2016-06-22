<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Ids
 */
trait Ids
{
    /**
     * @Transfer\ArrayInput
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $ids = [];

    /**
     * @return array
     */
    public function getIds()
    {
        return $this->ids;
    }
}
