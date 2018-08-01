<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Cabotage
 * @author ONE
 */
trait Cabotage
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
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
