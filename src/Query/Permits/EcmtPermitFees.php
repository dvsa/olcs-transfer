<?php

/**
 * Get Ecmt Permit Fees
 *
 * @author Kollol Shamsuddin <kol.shamsudin@capgemini.com>
 * @author Jason De Jonge <jason.de-jonge@capgemini.com>
 */
namespace Dvsa\Olcs\Transfer\Query\Permits;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\CachableShortTermQueryInterface;

/**
 * @Transfer\RouteName("backend/permits/ecmt-permit-fees")
 */
class EcmtPermitFees extends AbstractQuery
{

}
