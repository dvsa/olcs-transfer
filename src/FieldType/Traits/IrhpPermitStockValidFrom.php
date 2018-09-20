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
     * @Transfer\Validator({"name": "Date", "options": {"format": "d-m-Y"}})
     */
    protected $validFrom;

    /**
     * @return string
     */
    public function getValidFrom(): array
    {
        return $this->validFrom;
    }
}
