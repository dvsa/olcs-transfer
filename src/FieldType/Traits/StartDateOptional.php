<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait StartDateOptional
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Ian Lindsay <ian@hemera-business-services.co.uk>
 */
trait StartDateOptional
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     * @Transfer\Optional
     */
    protected $startDate;

    /**
     * @return string
     */
    public function getStartDate()
    {
        return $this->startDate;
    }
}
