<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * FiveYear Value
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Andy Newton <andy@vitri.ltd>
 */
trait FiveYearValue
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": -1}})
     */
    protected $fiveYearValue;

    /**
     * @return int
     */
    public function getFiveYearValue()
    {
        return $this->fiveYearValue;
    }
}
