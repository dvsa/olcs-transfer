<?php

/**
 * Retrieve active Ecmt application by licence and year
 */
namespace Dvsa\Olcs\Transfer\Query\Permits;

use Dvsa\Olcs\Transfer\FieldType\Traits\Licence;
use Dvsa\Olcs\Transfer\FieldType\Traits\YearOptional;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/permits/active-ecmt-application")
 */
class ActiveEcmtApplication extends AbstractQuery
{
    use Licence;
    use YearOptional;
}
