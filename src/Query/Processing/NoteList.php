<?php

namespace Dvsa\Olcs\Transfer\Query\Processing;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedQueryInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\PagedTrait;
use Dvsa\Olcs\Transfer\Query\OrderedTrait;
use Dvsa\Olcs\Transfer\Command\Traits\FieldType;

/**
 * Class Note
 * @Transfer\RouteName("backend/processing/note")
 */
class NoteList extends AbstractQuery
    implements PagedQueryInterface, OrderedQueryInterface
{
    use PagedTrait;
    use OrderedTrait;

    // Foreign Keys
    use FieldType\ApplicationOptional;
    use FieldType\CasesOptional;
    use FieldType\LicenceOptional;
    use FieldType\OrganisationOptional;
    use FieldType\TransportManagerOptional;
}
