<?php

/**
 * Withdraw ECMT Permit Application
 *
 * @author Scott Callaway
 */
namespace Dvsa\Olcs\Transfer\Command\Permits;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/permits/ecmt-permits-withdraw")
 * @Transfer\Method("POST")
 */
final class WithdrawEcmtPermitApplication extends AbstractCommand
{
    use Identity;
}
