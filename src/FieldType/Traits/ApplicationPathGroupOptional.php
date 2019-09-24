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
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
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
