<?php

/**
 * Unlicensed Operator Business Details
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
namespace Dvsa\Olcs\Transfer\Query\Operator;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\CachableQueryInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/operator-unlicensed/single")
 */
class UnlicensedBusinessDetails extends AbstractQuery implements CachableQueryInterface
{
    use Identity;
}
