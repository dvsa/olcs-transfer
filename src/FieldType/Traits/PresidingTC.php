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
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
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
