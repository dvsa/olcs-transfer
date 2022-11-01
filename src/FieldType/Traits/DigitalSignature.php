<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

trait DigitalSignature
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $digitalSignature;

    /**
     * @return int
     */
    public function getDigitalSignature()
    {
        return $this->digitalSignature;
    }
}
