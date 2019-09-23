<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * PeriodNameKey Optional
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Andy Newton <andy@vitri.ltd>
 */
trait PeriodNameKeyOptional
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min":1, "max":255}})
     * @Transfer\Optional
     */
    protected $periodNameKey;

    public function getPeriodNameKey()
    {
        return $this->periodNameKey;
    }
}
