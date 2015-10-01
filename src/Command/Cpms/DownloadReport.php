<?php

/**
 * Download Cpms Report
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
namespace Dvsa\Olcs\Transfer\Command\Cpms;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/cpms/report/named-single")
 * @Transfer\Method("PUT")
 */
final class DownloadReport extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min": 1}})
     */
    protected $reference;

    /**
     * Gets the value of reference.
     *
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }
}
