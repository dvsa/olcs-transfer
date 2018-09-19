<?php

/**
 * NextIrhpPermitStock
 */
namespace Dvsa\Olcs\Transfer\Query\IrhpPermitStock;

use Dvsa\Olcs\Transfer\Query\CachableShortTermQueryInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/irhp-permit-stock/next-stock")
 */
class NextIrhpPermitStock extends AbstractQuery implements CachableShortTermQueryInterface
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $permitType = null;

    /**
     * @return string
     */
    public function getPermitType()
    {
        return $this->permitType;
    }
}
