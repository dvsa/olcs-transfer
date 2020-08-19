<?php

/**
 * Reset to NotYetSubmitted
 */
namespace Dvsa\Olcs\Transfer\Command\IrhpApplication;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/irhp-application/reset-to-not-yet-submitted")
 * @Transfer\Method("PUT")
 */
final class ResetToNotYetSubmitted extends AbstractCommand
{
    use Identity;
}
