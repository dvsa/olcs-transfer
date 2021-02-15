<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait ApplicationPathGroupOptional
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Andy Newton <andy@vitri.ltd>
 */
trait ApplicationPathGroupOptional
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $applicationPathGroup;

    /**
     * @return int
     */
    public function getApplicationPathGroup()
    {
        return $this->applicationPathGroup;
    }
}
