<?php

namespace Dvsa\Olcs\Transfer\Query\DataService;

use Dvsa\Olcs\Transfer\FieldType\Traits;
use Dvsa\Olcs\Transfer\Query\CachableShortTermQueryInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/data-service/application/status")
 */
class ApplicationStatus extends AbstractQuery implements CachableShortTermQueryInterface
{
    use Traits\OrganisationOptional;
}
