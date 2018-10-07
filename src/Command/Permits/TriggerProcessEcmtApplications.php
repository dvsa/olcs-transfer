<?php

/**
 * Trigger process ECMT applications
 *
 * @author Jonathan Thomas <jonathan@opalise.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Permits;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/permits/trigger-process-ecmt-applications")
 * @Transfer\Method("POST")
 */
final class TriggerProcessEcmtApplications extends AbstractCommand
{
}
