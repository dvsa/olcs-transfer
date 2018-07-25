<?php

/**
 * updateEcmtEmissions
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Permits;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\FieldType\Traits\Emissions;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/permits/ecmt-permit-application/ecmt-emissions")
 * @Transfer\Method("PUT")
 */
class UpdateEcmtEmissions extends AbstractCommand
{
    use Identity;
    use Emissions;

}
