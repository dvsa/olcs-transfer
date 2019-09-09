<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * PermitsRequired Euro 6
 */
trait RequiredEuro6Optional
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Optional
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": -1}})
     */
    public $requiredEuro6;

    /**
     * @return int
     */
    public function getRequiredEuro6()
    {
        return (int)$this->requiredEuro6;
    }
}
