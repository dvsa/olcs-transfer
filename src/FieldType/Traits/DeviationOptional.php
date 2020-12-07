<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait DeviationOptional
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 *
 */
trait DeviationOptional
{
    /**
     * @Transfer\Optional
     * @Transfer\Validator({"name":"Laminas\I18n\Validator\IsFloat"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $deviation;

    /**
     * Get deviation
     *
     * @return float
     */
    public function getDeviation()
    {
        return $this->deviation;
    }
}
