<?php

/**
 * ECMT Constrained Countries
 *
 * @author Tonci Vidovic <tonci.vidovic@capgemini.com>
 */
namespace Dvsa\Olcs\Transfer\Query\Permits;

use Dvsa\Olcs\Transfer\Query\CachableMediumTermQueryInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\FieldType\Traits\HasEcmtConstraints;

/**
 * @Transfer\RouteName("backend/permits/ecmt-constrained-countries")
 */
class EcmtConstrainedCountriesList extends AbstractQuery implements CachableMediumTermQueryInterface
{
    use HasEcmtConstraints;
}
