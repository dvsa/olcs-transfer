<?php

/**
 * Get all valid ECMT permits by application
 *
 * @author Tonci Vidovic <tonci.vidovic@capgemini.com>
 */
namespace Dvsa\Olcs\Transfer\Query\Permits;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\Query\PagedTrait;


/**
 * @Transfer\RouteName("backend/permits/valid-ecmt")
 */
class ValidEcmtPermits extends AbstractQuery
{
    use Identity;
    use PagedTrait;
}
