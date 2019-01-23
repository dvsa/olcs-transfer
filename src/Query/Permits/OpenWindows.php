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
     * @var int
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $permitType;

    /**
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d H:i:s"}})
     */
    protected $currentDateTime;

    /**
     * @return int
     */
    public function getPermitType()
    {
        return $this->permitType;
    }

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
