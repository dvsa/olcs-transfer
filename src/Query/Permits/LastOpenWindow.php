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
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
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
