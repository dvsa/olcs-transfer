<?php

namespace Dvsa\Olcs\Transfer\Query\Application;

use Dvsa\Olcs\Transfer\Query\Lva\AbstractGoodsVehicles;
use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Query\OrderedTrait;
use Dvsa\Olcs\Transfer\Query\PagedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedTrait;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @author Rob Caiger <rob@clocal.co.uk>
 *         
 * @Transfer\RouteName("backend/application/single/goods-vehicles")
 */
class GoodsVehicles extends AbstractGoodsVehicles implements PagedQueryInterface, OrderedQueryInterface
{
    use PagedTrait,
        OrderedTrait;
}
