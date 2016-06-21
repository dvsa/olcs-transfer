<?php

namespace Dvsa\Olcs\Transfer\Command\Tm;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * UpdateNysiisName
 *
 * @Transfer\RouteName("backend/transport-manager/single/update-nysiis-name")
 * @Transfer\Method("PUT")
 */
final class UpdateNysiisName extends AbstractCommand
{
    use Identity;
}
