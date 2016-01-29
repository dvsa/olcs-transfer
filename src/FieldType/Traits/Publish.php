<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Publish
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Valtech <uk@valtech.co.uk>
 */
trait Publish
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     */
    protected $publish;

    /**
     * @return string
     */
    public function getPublish()
    {
        return $this->publish;
    }
}
