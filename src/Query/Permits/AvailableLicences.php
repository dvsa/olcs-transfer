<?php

/**
 * Get licences for a single IRHP application by application id
 */
namespace Dvsa\Olcs\Transfer\Query\Permits;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;

/**
 * @Transfer\RouteName("backend/permits/single/available-licences")
 */
class AvailableLicences extends AbstractQuery
{
    use Identity;
}
