<?php

/**
 * Delete feature toggle
 */
namespace Dvsa\Olcs\Transfer\Command\Permits;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractDeleteCommand;

/**
 * @Transfer\RouteName("backend/ecmt-permit-application/single")
 * @Transfer\Method("DELETE")
 */
final class DeleteEcmtPermitApplication extends AbstractDeleteCommand
{
}
