<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Is Adjourned
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Valtech <uk@valtech.co.uk>
 */
trait IsAdjourned
{
    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\InArray", "options": {"haystack": {"Y","N"}}})
     */
    protected $isAdjourned;

    /**
     * @return string
     */
    public function getIsAdjourned()
    {
        return $this->isAdjourned;
    }
}
