<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Annual Value
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Andy Newton <andy@vitri.ltd>
 */
trait AnnualValue
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": -1}})
     */
    protected $annualValue;

    /**
     * @return int
     */
    public function getAnnualValue()
    {
        return $this->annualValue;
    }
}
