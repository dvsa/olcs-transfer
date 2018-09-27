<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * IRHP Permit Stock
 *
 * @package Dvsa\Olcs\Transfer\FieldType\Traits
 * @author Andy Newton <andy@vitri.ltd>
 */
trait IrhpPermitStock
{
    /**
     * @var int
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $irhpPermitStock;

    /**
     * @return int
     */
    public function getIrhpPermitStock(): int
    {
        return $this->irhpPermitStock;
    }
}
