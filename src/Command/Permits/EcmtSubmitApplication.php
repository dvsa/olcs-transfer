<?php

/**
 * Submit the ECMT application
 *
 * @author Ian Lindsay <ian@hemera-business-services.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Permits;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/permits/ecmt-permit-application/submit")
 * @Transfer\Method("PUT")
 */
final class EcmtSubmitApplication extends AbstractCommand
{
    use Identity;
}
