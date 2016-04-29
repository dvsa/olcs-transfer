<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait IrfoGvPermit
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 */
trait IrfoGvPermit
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $irfoGvPermit;

    /**
     * @return int
     */
    public function getIrfoGvPermit()
    {
        return $this->irfoGvPermit;
    }
}
