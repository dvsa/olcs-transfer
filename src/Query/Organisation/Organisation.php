<?php

/**
 * Organisation
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query\Organisation;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/organisation/single")
 */
class Organisation extends AbstractQuery
{
    use Identity;
}
