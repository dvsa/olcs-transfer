<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait IRHP Permit Stock Valid Start
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 */
trait IrhpPermitStockValidFrom
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $validFrom;

    /**
     * @return string
     */
    public function getValidFrom(): string
    {
        return $this->validFrom;
    }
}
