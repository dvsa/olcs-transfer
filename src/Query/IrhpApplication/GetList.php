<?php

/**
 * Get a list of IRHP Applications
 *
 * @author Scott Callaway <scott.callaway@capgemini.com>
 */
namespace Dvsa\Olcs\Transfer\Query\IrhpApplication;

use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Query\OrderedTraitOptional;

use Dvsa\Olcs\Transfer\Query\CachableShortTermQueryInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/irhp-application")
 */
final class GetList extends AbstractQuery implements CachableShortTermQueryInterface, OrderedQueryInterface
{
    use OrderedTraitOptional;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Optional
     */
    protected $status = null;

    public function getStatus()
    {
        return $this->status;
    }
}
