<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * IRHP Permit Stock Type Trait
 *
 * @package Dvsa\Olcs\Transfer\FieldType\Traits
 * @author Scott Callaway <scott.callaway@capgemini.com>
 */
trait IrhpPermitStockType
{
    /**
     * @var string
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *      "name":"Zend\Validator\Between",
     *      "options": {
     *          "min": 0,
     *          "max": 99999
     *      }
     * })
     */
    protected $permitType;

    /**
     * @return string
     */
    public function getPermitType(): string
    {
        return $this->permitType;
    }
}
