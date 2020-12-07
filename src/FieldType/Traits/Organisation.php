<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait Organisation
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Valtech <uk@valtech.co.uk>
 */
trait Organisation
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $organisation;

    /**
     * @return int
     */
    public function getOrganisation()
    {
        return $this->organisation;
    }
}
