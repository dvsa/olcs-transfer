<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait Declaration
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Andy Newton <andy@vitri.ltd>
 */
trait Declaration
{
    /**
     * @var int
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $declaration;

    /**
     * @return int
     */
    public function getDeclaration()
    {
        return $this->declaration;
    }
}
