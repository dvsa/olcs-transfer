<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait DecisionsOptional
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Shaun Lizzio <shaun@lizzio.co.uk>
 */
trait DecisionsOptional
{
    /**
     * @Transfer\Optional()
     * @Transfer\ArrayInput
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\FilterEmptyItems"})
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\UniqueItems"})
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $decisions = [];

    /**
     * @return array
     */
    public function getDecisions()
    {
        return $this->decisions;
    }
}
