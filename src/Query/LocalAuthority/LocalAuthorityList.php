<?php

namespace Dvsa\Olcs\Transfer\Query\LocalAuthority;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\OrderedTraitOptional;
use Dvsa\Olcs\Transfer\Query\PagedTraitOptional;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * Class LocalAuthorityList
 * @Transfer\RouteName("backend/local-authority")
 */
class LocalAuthorityList extends AbstractQuery
{
    use PagedTraitOptional;
    use OrderedTraitOptional;
}
