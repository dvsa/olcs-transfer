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
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
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
