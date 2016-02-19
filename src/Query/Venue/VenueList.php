<?php

namespace Dvsa\Olcs\Transfer\Query\Venue;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\FieldType\Traits\TrafficAreaOptional;

/**
 * Class VenueList
 * @Transfer\RouteName("backend/venue-list")
 */
class VenueList extends AbstractQuery
{
    use TrafficAreaOptional;
}
