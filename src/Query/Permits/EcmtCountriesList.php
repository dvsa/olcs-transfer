<?php

/**
 * ECMT Countries
 *
 * @author Tonci Vidovic <tonci.vidovic@capgemini.com>
 */
namespace Dvsa\Olcs\Transfer\Query\Permits;

use Dvsa\Olcs\Transfer\FieldType\Traits\IsEcmtState;
use Dvsa\Olcs\Transfer\Query\CachableMediumTermQueryInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/permits/ecmt-countries")
 */
class EcmtCountriesList extends AbstractQuery implements CachableMediumTermQueryInterface
{
    use IsEcmtState;
}
