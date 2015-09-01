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
     * @var string"
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d H:i:s"}})
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
