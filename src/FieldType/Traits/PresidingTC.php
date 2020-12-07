<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait PresidingTC
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Valtech <uk@valtech.co.uk>
 */
trait PresidingTC
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $presidingTc;

    /**
     * @return int
     */
    public function getPresidingTc()
    {
        return $this->presidingTc;
    }
}
