<?php

/**
 * Revive ECMT Permit Application from withdrawn state
 *
 * @author Jonathan Thomas <jonathan@opalise.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Permits;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/permits/ecmt-revive-from-withdrawn")
 * @Transfer\Method("PUT")
 */
final class ReviveEcmtPermitApplicationFromWithdrawn extends AbstractCommand
{
    use Identity;
}
