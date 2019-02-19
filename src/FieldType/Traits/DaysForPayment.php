<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait Days for Payment
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Andy Newton <andy@vitri.ltd>
 */
trait DaysForPayment
{
    /**
     * @var int
     * @Transfer\Optional
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $daysForPayment;

    /**
     * @return int
     */
    public function getDaysForPayment(): int
    {
        return $this->daysForPayment;
    }
}
