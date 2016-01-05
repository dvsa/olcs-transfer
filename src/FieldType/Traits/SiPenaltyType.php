<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait SiPenaltyType
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Valtech <uk@valtech.co.uk>
 */
trait SiPenaltyType
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $siPenaltyType;

    /**
     * @return int
     */
    public function getSiPenaltyType()
    {
        return $this->siPenaltyType;
    }
}
