<?php

/**
 * Internal issued permits summary
 */
namespace Dvsa\Olcs\Transfer\Query\IrhpApplication;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\FieldType\Traits\Licence;

/**
 * @Transfer\RouteName("backend/irhp-application/internal-issued-permits-summary")
 */
class InternalIssuedPermitsSummary extends AbstractQuery
{
    use Licence;
}
