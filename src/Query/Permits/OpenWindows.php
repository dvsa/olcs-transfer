<?php

/**
 * Get all open windows across all stock
 *
 * @author Jonathan Thomas <jonathan@opalise.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query\Permits;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/permits/open-windows")
 */
class OpenWindows extends AbstractQuery
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
