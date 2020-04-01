<?php

/**
 * Get list of fees for a bilateral permit, depending on the country
 * @todo olcs-26516 introduces cache encryption - at this point mark this query as encryption not being required
 */
namespace Dvsa\Olcs\Transfer\Query\Fee;

use Dvsa\Olcs\Transfer\FieldType\Traits\Country;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\CachableMediumTermQueryInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/fee/irhp-bilateral-by-country")
 */
class IrhpBilateralByCountry extends AbstractQuery implements CachableMediumTermQueryInterface
{
    use Country;
}
