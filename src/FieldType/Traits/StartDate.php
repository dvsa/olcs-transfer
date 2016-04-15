<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait StartDate
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 */
trait StartDate
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
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
