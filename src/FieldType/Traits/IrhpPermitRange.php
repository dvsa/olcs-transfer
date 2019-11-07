<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * IRHP Permit Range
 *
 * @package Dvsa\Olcs\Transfer\FieldType\Traits
 * @author Andy Newton <andy@vitri.ltd>
 */
trait IrhpPermitRange
{
    /**
     * @var int
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $irhpPermitRange;

    /**
     * @return int
     */
    public function getIrhpPermitRange(): int
    {
        return $this->irhpPermitRange;
    }
}
