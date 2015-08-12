<?php

/**
 * CpidOrganisationExport.php
 *
 * @author Josh Curtis <josh.curtis@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Organisation;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/organisation/cpid")
 * @Transfer\Method("POST")
 *
 * @author Josh Curtis <josh.curtis@valtech.co.uk>
 */
final class CpidOrganisationExport extends AbstractCommand
{
    /**
     * @Transfer\Optional
     * @Transfer\Validator({
     *     "name":"Zend\Validator\InArray",
     *     "options": {
     *         "haystack": {
     *             "op_cpid_central",
     *             "op_cpid_local",
     *             "op_cpid_corporation",
     *             "op_cpid_default",
     *             "op_cpid_all"
     *         }
     *     }
     * })
     */
    protected $cpid;

    /**
     * @return mixed
     */
    public function getCpid()
    {
        return $this->cpid;
    }
}
