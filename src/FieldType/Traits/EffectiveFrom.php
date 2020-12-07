<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Effective From
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Andy Newton <andy@vitri.ltd>
 */
trait EffectiveFrom
{
    /**
     * @var string
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $effectiveFrom;

    /**
     * @return string
     */
    public function getEffectiveFrom()
    {
        return $this->effectiveFrom;
    }
}
