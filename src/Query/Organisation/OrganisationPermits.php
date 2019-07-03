<?php

/**
 * Organisation Permits Query
 *
 */
namespace Dvsa\Olcs\Transfer\Query\Organisation;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\FieldType\Traits\IrhpPermitStockOptional;
use Dvsa\Olcs\Transfer\FieldType\Traits\YearOptional;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\CachableShortTermQueryInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/organisation-permits/single")
 */
class OrganisationPermits extends AbstractQuery implements CachableShortTermQueryInterface
{
    use Identity;
    use YearOptional;
}
