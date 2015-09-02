<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Is Cancelled
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Valtech <uk@valtech.co.uk>
 */
trait IsCancelled
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y","N"}}})
     */
    protected $isCancelled;

    /**
     * @return string
     */
    public function getIsCancelled()
    {
        return $this->isCancelled;
    }
}
