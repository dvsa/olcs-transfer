<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * IrhpPermitStockInitialStock
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Scott Callaway <scott.callaway@capgemini.com>
 */
trait IrhpPermitStockInitialStock
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $initialStock;

    public function getInitialStock(): string
    {
        return $this->initialStock;
    }
}
