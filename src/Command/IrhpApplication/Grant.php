<?php

/**
 * Grant IRHP Permit Application
 *
 * @author Andy Newton <andy@vitri.ltd>
 */

namespace Dvsa\Olcs\Transfer\Command\IrhpApplication;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/irhp-application/grant")
 * @Transfer\Method("PUT")
 */
final class Grant extends AbstractCommand
{
    use Identity;
}
