<?php

namespace Dvsa\Olcs\Transfer\Query\Scan;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/scan/single")
 */
class GetSingle extends AbstractQuery
{
    use Identity;
}
