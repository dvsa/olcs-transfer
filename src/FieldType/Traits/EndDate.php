<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait EndDate
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 */
trait EndDate
{
    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $endDate;

    /**
     * @return string
     */
    public function getEndDate()
    {
        return $this->endDate;
    }
}
