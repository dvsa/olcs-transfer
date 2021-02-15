<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait StartDate ISO8601 format
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 */
trait Iso8601StartDate
{
    /**
     * @var string
     * @Transfer\Filter({"name": "Laminas\Filter\DateTimeFormatter"})
     * @Transfer\Validator({"name": "Date", "options": {"format": \DateTime::ISO8601}})
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
