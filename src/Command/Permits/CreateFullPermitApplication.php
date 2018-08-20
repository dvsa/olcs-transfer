<?php

/**
 * Create Full ECMT Permit Application
 *
 */
namespace Dvsa\Olcs\Transfer\Command\Permits;

use Dvsa\Olcs\Transfer\FieldType\Traits\EcmtApplicationAllOptional;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/permits/ecmt-full-permit-application")
 * @Transfer\Method("POST")
 */
final class CreateFullPermitApplication extends AbstractCommand
{
    use EcmtApplicationAllOptional;
}
