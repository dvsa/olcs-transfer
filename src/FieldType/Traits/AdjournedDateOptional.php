<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Agreed Date
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Valtech <uk@valtech.co.uk>
 */
trait AdjournedDateOptional
{
    /**
     * @var string
     * @Transfer\Optional
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d H:i:s"}})
     */
    protected $adjournedDate;

    /**
     * @return string
     */
    public function getAdjournedDate()
    {
        return $this->adjournedDate;
    }
}
