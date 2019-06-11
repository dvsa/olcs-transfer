<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * PermitsRequired Euro 5
 */
trait RequiredEuro5Optional
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Optional
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": -1}})
     */
    public $requiredEuro5;

    /**
     * @return int
     */
    public function getRequiredEuro5()
    {
        return (int)$this->requiredEuro5;
    }
}
