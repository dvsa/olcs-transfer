<?php

namespace Dvsa\Olcs\Transfer\Query\Cases\PiVenue;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\FieldType\Traits\TrafficAreaOptional;

/**
 * Class PiVenueList
 * @Transfer\RouteName("backend/venue-list")
 */
class PiVenueList extends AbstractQuery
{
    use TrafficAreaOptional;
}
