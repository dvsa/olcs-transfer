<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Notes Trait
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Valtech <uk@valtech.co.uk>
 */
trait Notes
{
    /**
     * @var String
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":4000}})
     */
    protected $notes;

    /**
     * @return int
     */
    public function getNotes()
    {
        return $this->notes;
    }
}
