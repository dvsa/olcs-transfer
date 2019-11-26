<?php

/**
 * ECMT Application issue fee per permit
 *
 * @author Jonathan Thomas <jonathan@opalise.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query\Permits;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;

/**
 * @Transfer\RouteName("backend/permits/ecmt-application-issue-fee-per-permit")
 */
class EcmtApplicationIssueFeePerPermit extends AbstractQuery
{
    use Identity;
}
