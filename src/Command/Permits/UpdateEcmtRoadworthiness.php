<?php

/**
 * Update Ecmt Roadworthiness
 */
namespace Dvsa\Olcs\Transfer\Command\Permits;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\FieldType\Traits\Roadworthiness;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/permits/ecmt-permit-application/ecmt-roadworthiness")
 * @Transfer\Method("PUT")
 */
class UpdateEcmtRoadworthiness extends AbstractCommand
{
    use Identity;
    use Roadworthiness;
}