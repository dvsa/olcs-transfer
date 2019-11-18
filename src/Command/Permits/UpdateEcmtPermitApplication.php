<?php

/**
 * Create ECMT Permit Application
 *
 * @author Tonci Vidovic <tonci.vidovic@capgemini.com>
 */
namespace Dvsa\Olcs\Transfer\Command\Permits;

use Dvsa\Olcs\Transfer\FieldType\Traits\ApplicationCheckedOptional;
use Dvsa\Olcs\Transfer\FieldType\Traits\EcmtApplicationAllOptional;
use Dvsa\Olcs\Transfer\FieldType\Traits\Licence;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/permits/ecmt-permit-application")
 * @Transfer\Method("PUT")
 */
final class UpdateEcmtPermitApplication extends AbstractCommand
{
    use Licence;
    use EcmtApplicationAllOptional;
    use ApplicationCheckedOptional;
}
