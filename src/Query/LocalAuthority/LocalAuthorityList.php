<?php

namespace Dvsa\Olcs\Transfer\Query\LocalAuthority;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\PagedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedTrait;

/**
 * Class PiVenueList
 * @Transfer\RouteName("backend/local-authority")
 */
class LocalAuthorityList extends AbstractQuery implements  PagedQueryInterface
{
    use PagedTrait;
}
