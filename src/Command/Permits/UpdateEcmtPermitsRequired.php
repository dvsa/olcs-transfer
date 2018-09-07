<?php

/**
 * updateEcmtPermitsRequired
 *
 * @author ONE
 */
namespace Dvsa\Olcs\Transfer\Command\Permits;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\FieldType\Traits\PermitsRequired;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/permits/ecmt-permit-application/ecmt-permits-required")
 * @Transfer\Method("PUT")
 */
class UpdateEcmtPermitsRequired extends AbstractCommand
{
    use Identity;
    use PermitsRequired;
}
