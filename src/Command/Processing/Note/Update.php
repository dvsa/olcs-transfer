<?php

namespace Dvsa\Olcs\Transfer\Command\Processing\Note;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\FieldType as FieldType;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldTypeTraits;

/**
 * Class to Update a Note
 *
 * @Transfer\Method("PUT")
 * @Transfer\RouteName("backend/processing/note/single")
 */
class Update extends AbstractCommand
    implements
    FieldType\IdentityInterface,
    FieldType\VersionInterface,
    FieldType\ApplicationInterface,
    FieldType\CasesInterface,
    FieldType\LicenceInterface,
    FieldType\OrganisationInterface,
    FieldType\TransportManagerInterface
{
    // Identity & Locking
    use FieldTypeTraits\Identity;
    use FieldTypeTraits\Version;

    // Foreign Keys
    use FieldTypeTraits\ApplicationOptional;
    use FieldTypeTraits\CasesOptional;
    use FieldTypeTraits\LicenceOptional;
    use FieldTypeTraits\OrganisationOptional;
    use FieldTypeTraits\TransportManagerOptional;

    // Individual Fields
    use FieldTypeTraits\CommentOptional;
    use FieldTypeTraits\NoteType;
}
