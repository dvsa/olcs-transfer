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
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $validTo;

    /**
     * @return string
     */
    public function getValidTo(): string
    {
        return $this->validTo;
    }
}
