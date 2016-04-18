<?php

/**
 * Outstanding Fees
 *
 * @author Alex Peshkov <alex.peshkov@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query\Application;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\CachableQueryInterface;

/**
 * @Transfer\RouteName("backend/application/single/outstanding-fees")
 */
class OutstandingFees extends AbstractQuery implements CachableQueryInterface
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