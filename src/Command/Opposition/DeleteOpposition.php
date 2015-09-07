<?php

namespace Dvsa\Olcs\Transfer\Command\Opposition;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractDeleteCommand;

/**
 * Concrete delete class.
 *
 * @Transfer\RouteName("backend/opposition/single")
 * @Transfer\Method("DELETE")
 */
class DeleteOpposition extends AbstractDeleteCommand
{
    //
}
