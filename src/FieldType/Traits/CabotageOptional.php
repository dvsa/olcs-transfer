<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * CabotageOptional
 */
trait CabotageOptional
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0, "inclusive": true}})
     * @Transfer\Optional
     */
    protected $cabotage;

    /**
     * @return int
     */
    public function getCabotage()
    {
        return $this->cabotage;
    }
}
