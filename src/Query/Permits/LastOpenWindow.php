<?php

/**
 * Get the last open window across all stock items
 *
 * @author Jonathan Thomas <jonathan@opalise.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query\Permits;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/permits/last-open-window")
 */
class LastOpenWindow extends AbstractQuery
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
