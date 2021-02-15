<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait IsMlh
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
trait IsMlh
{
    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\InArray", "options": {"haystack": {"Y","N"}}})
     */
    protected $isMlh;

    public function getIsMlh()
    {
        return $this->isMlh;
    }
}
