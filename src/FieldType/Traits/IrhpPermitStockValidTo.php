<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait IRHP Permit Stock Valid To
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 */
trait IrhpPermitStockValidTo
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name": "Date", "options": {"format": "d-m-Y"}})
     */
    protected $validTo;

    /**
     * @return string
     */
    public function getValidTo(): array
    {
        return $this->validTo;
    }
}
