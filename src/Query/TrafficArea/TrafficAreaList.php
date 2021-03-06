<?php

/**
 * Get a list of Traffic Areas
 *
 * @author Alex Peshkov <alex.peshkov@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query\TrafficArea;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Query\OrderedTrait;
use Dvsa\Olcs\Transfer\Query\CacheableLongTermQueryInterface;
use Dvsa\Olcs\Transfer\Query\PublicQueryCacheInterface;

/**
 * @Transfer\RouteName("backend/traffic-area")
 */
final class TrafficAreaList extends AbstractQuery implements
    OrderedQueryInterface,
    PublicQueryCacheInterface,
    CacheableLongTermQueryInterface
{
    use OrderedTrait;
}
