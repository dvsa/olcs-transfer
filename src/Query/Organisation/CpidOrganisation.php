<?php

/**
 * CpidOrganisation.php
 *
 * @author Joshua Curtis <josh.curtis@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query\Organisation;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\PagedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedTrait;
use Dvsa\Olcs\Transfer\Query\OrderedTrait;

/**
 * @Transfer\RouteName("backend/organisation/cpid")
 *
 * @author Joshua Curtis <josh.curtis@valtech.co.uk>
 */
class CpidOrganisation extends AbstractQuery implements PagedQueryInterface
{
    use PagedTrait;

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
