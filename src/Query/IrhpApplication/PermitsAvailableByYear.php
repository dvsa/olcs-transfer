<?php

/**
 * Permits available by year
 */
namespace Dvsa\Olcs\Transfer\Query\IrhpApplication;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\FieldType\Traits\Year;

/**
 * @Transfer\RouteName("backend/irhp-application/permits-available-by-year")
 */
class PermitsAvailableByYear extends AbstractQuery
{
    use Year;
}
