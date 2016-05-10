<?php

namespace Dvsa\Olcs\Transfer\Query\Venue;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\FieldType\Traits\TrafficAreaOptional;
use Dvsa\Olcs\Transfer\Query\CachableMediumTermQueryInterface;

/**
 * Class VenueList
 * @Transfer\RouteName("backend/venue-list")
 */
class VenueList extends AbstractQuery implements CachableMediumTermQueryInterface
{
    use TrafficAreaOptional;
}
