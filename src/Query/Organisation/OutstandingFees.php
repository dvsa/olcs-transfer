<?php

/**
 * Outstanding Fees
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
namespace Dvsa\Olcs\Transfer\Query\Organisation;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\CachableShortTermQueryInterface;

/**
 * @Transfer\RouteName("backend/organisation/single/outstanding-fees")
 */
class OutstandingFees extends AbstractQuery implements CachableShortTermQueryInterface
{
    use Identity;

    /**
     * @return mixed
     * @Transfer\Filter({"name":"Zend\Filter\Boolean"})
     * @Transfer\Optional
     */
    protected $hideExpired;

    /**
     * @return mixed
     */
    public function getHideExpired()
    {
        return $this->hideExpired;
    }
}
