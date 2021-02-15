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
use Dvsa\Olcs\Transfer\Query\CacheableShortTermQueryInterface;

/**
 * @Transfer\RouteName("backend/organisation/single/outstanding-fees")
 */
class OutstandingFees extends AbstractQuery implements CacheableShortTermQueryInterface
{
    use Identity;

    /**
     * @return mixed
     * @Transfer\Filter({"name":"Laminas\Filter\Boolean"})
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
