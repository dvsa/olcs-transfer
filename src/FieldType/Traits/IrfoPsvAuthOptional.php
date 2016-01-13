<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait IrfoPsvAuthOptional
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Valtech <uk@valtech.co.uk>
 */
trait IrfoPsvAuthOptional
{
    /**
     * @var int
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $irfoPsvAuth;

    /**
     * @return int
     */
    public function getIrfoPsvAuth()
    {
        return $this->irfoPsvAuth;
    }
}
