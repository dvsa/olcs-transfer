<?php

namespace Dvsa\Olcs\Transfer\Command\Processing\Note;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\Traits\FieldType;

/**
 * Class to Delete a Note
 *
 * @Transfer\Method("DELETE")
 * @Transfer\RouteName("backend/processing/note/single")
 */
class Delete extends AbstractCommand
{
    // Identity & Locking
    use FieldType\Identity;
    use FieldType\Version;
}
