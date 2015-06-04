<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait CasesOptional
 *
 * Only called Cases because Case is a reserved word. Still works as if it was called Case.
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Valtech <uk@valtech.co.uk>
 */
trait CasesOptional
{
    /**
     * @var int
     * @Transfer\optional()
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $case;

    /**
     * @return int
     */
    public function getCase()
    {
        return $this->case;
    }
}
