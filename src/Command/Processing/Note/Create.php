<?php

namespace Dvsa\Olcs\Transfer\Command\Processing\Note;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\FieldType as FieldType;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldTypeTraits;

/**
 * Class to Create a Note
 *
 * @Transfer\Method("POST")
 * @Transfer\RouteName("backend/processing/note")
 */
class Create extends AbstractCommand
    implements
    FieldType\ApplicationInterface,
    FieldType\CasesInterface,
    FieldType\LicenceInterface,
    FieldType\OrganisationInterface,
    FieldType\TransportManagerInterface
{
    // Foreign Keys
    use FieldTypeTraits\ApplicationOptional;
    use FieldTypeTraits\BusRegOptional;
    use FieldTypeTraits\CasesOptional;
    use FieldTypeTraits\LicenceOptional;
    use FieldTypeTraits\OrganisationOptional;
    use FieldTypeTraits\TransportManagerOptional;

    // Individual Fields
    use FieldTypeTraits\CommentOptional;
    //use FieldTypeTraits\NoteType;
}
