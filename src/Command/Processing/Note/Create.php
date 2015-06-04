<?php

namespace Dvsa\Olcs\Transfer\Command\Processing\Note;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\Traits\FieldType;

/**
 * Class to Create a Note
 *
 * @Transfer\Method("POST")
 * @Transfer\RouteName("backend/processing/note/single")
 */
class Create extends AbstractCommand
{
    // Identity & Locking
    use FieldType\Identity;

    // Foreign Keys
    use FieldType\ApplicationOptional;
    use FieldType\CasesOptional;
    use FieldType\LicenceOptional;
    use FieldType\OrganisationOptional;
    use FieldType\TransportManagerOptional;

    // Individual Fields
    use FieldType\CommentOptional;
}
