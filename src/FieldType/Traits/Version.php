<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

trait Version
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
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
