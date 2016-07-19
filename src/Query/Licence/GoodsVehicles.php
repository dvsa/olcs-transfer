<?php

namespace Dvsa\Olcs\Transfer\Query\Licence;

use Dvsa\Olcs\Transfer\Query\Lva\AbstractGoodsVehicles;
use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Query\OrderedTrait;
use Dvsa\Olcs\Transfer\Query\PagedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedTrait;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/licence/single/goods-vehicles")
 */
class GoodsVehicles extends AbstractGoodsVehicles implements PagedQueryInterface, OrderedQueryInterface
{
    use PagedTrait,
        OrderedTrait;
}
