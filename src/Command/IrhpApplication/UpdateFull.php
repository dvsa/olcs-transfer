<?php

/**
 * Update Irhp Application
 */
namespace Dvsa\Olcs\Transfer\Command\IrhpApplication;

use Dvsa\Olcs\Transfer\FieldType\Traits\DateReceived;
use Dvsa\Olcs\Transfer\FieldType\Traits\Declaration;
use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\FieldType\Traits\MultipleNoOfPermits;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/irhp-application/full")
 * @Transfer\Method("PUT")
 */
final class UpdateFull extends AbstractCommand
{
    use Identity;
    use DateReceived;
    use MultipleNoOfPermits;
    use Declaration;
}