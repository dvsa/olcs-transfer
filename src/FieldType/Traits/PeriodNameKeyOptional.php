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
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength", "options":{"min":1, "max":512}})
     * @Transfer\Optional
     */
    protected $periodNameKey;

    public function getPeriodNameKey()
    {
        return $this->periodNameKey;
    }
}
