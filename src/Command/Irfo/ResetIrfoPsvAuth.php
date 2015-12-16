<?php

/**
 * Reset IRFO PSV Auth
 */
namespace Dvsa\Olcs\Transfer\Command\Irfo;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/irfo/psv-auth/single/reset")
 * @Transfer\Method("PUT")
 */
final class ResetIrfoPsvAuth extends UpdateIrfoPsvAuth
{
}
