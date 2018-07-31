<?php

/**
 * updateEcmtCabotage
 *
 * @author ONE
 */
namespace Dvsa\Olcs\Transfer\Command\Permits;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\FieldType\Traits\Cabotage;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/permits/ecmt-permit-application/ecmt-cabotage")
 * @Transfer\Method("PUT")
 */
class UpdateEcmtCabotage extends AbstractCommand
{
    use Identity;
    use Cabotage;
}
