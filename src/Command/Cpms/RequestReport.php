<?php

/**
 * Request Cpms Report
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
namespace Dvsa\Olcs\Transfer\Command\Cpms;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/cpms/report")
 * @Transfer\Method("POST")
 */
final class RequestReport extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min": 1}})
     */
    protected $reportCode;

    /**
     * Gets the value of reportCode.
     *
     * @return mixed
     */
    public function getReportCode()
    {
        return $this->reportCode;
    }
}
