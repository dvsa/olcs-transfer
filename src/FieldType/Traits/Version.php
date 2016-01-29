<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

trait Version
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $version;

    /**
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }
}
