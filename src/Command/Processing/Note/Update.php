<?php

namespace Dvsa\Olcs\Transfer\Command\Processing\Note;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\Traits\FieldType;

/**
 * Class to Update a Note
 *
 * @Transfer\Method("PUT")
 * @Transfer\RouteName("backend/processing/note/single")
 */
class Update extends AbstractCommand
{
    // Identity & Locking
    use FieldType\Identity;
    use FieldType\Version;

    // Foreign Keys
    use FieldType\ApplicationOptional;
    use FieldType\CasesOptional;
    use FieldType\LicenceOptional;
    use FieldType\OrganisationOptional;
    use FieldType\TransportManagerOptional;

    // Individual Fields
    use FieldType\CommentOptional;
}
