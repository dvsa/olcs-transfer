<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * CurrentDateTime
 * @author Andy Newton <andy@vitri.ltd>
 */
trait CurrentDateTime
{
    /**
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d H:i:s"}})
     */
    protected $currentDateTime;

    /**
     * Get current date
     *
     * @return string
     */
    public function getCurrentDateTime()
    {
        return $this->currentDateTime;
    }
}
