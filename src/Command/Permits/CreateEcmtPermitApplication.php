<?php

/**
 * Create ECMT Permit Application
 */
namespace Dvsa\Olcs\Transfer\Command\Permits;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits\EcmtApplicationAllOptional;
use Dvsa\Olcs\Transfer\FieldType\Traits\FromInternal;
use Dvsa\Olcs\Transfer\FieldType\Traits\IrhpPermitStock;
use Dvsa\Olcs\Transfer\FieldType\Traits\Licence;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/permits/ecmt-permit-application")
 * @Transfer\Method("POST")
 */
final class CreateEcmtPermitApplication extends AbstractCommand
{
    use Licence;
    use IrhpPermitStock;
    use EcmtApplicationAllOptional;
    use FromInternal;
}
