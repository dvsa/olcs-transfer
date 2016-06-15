<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Hearing Date
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Valtech <uk@valtech.co.uk>
 */
trait HearingDate
{
    /**
     * @var string
     * @Transfer\Filter({"name": "Zend\Filter\DateTimeFormatter"})
     * @Transfer\Validator({"name": "Date", "options": {"format": \DateTime::ISO8601}})
     */
    protected $hearingDate;

    /**
     * @return string
     */
    public function getHearingDate()
    {
        return $this->hearingDate;
    }
}
