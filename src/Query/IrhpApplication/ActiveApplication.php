<?php

/**
 * Get a single IRHP application by id
 */
namespace Dvsa\Olcs\Transfer\Query\IrhpApplication;

use Dvsa\Olcs\Transfer\FieldType\Traits\IrhpPermitType;
use Dvsa\Olcs\Transfer\FieldType\Traits\Licence;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/irhp-application/licence/active")
 */
class ActiveApplication extends AbstractQuery
{
    use Licence;
    use IrhpPermitType;
}
