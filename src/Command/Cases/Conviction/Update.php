<?php

namespace Dvsa\Olcs\Transfer\Command\Cases\Conviction;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType as FieldType;

/**
 * @Transfer\RouteName("backend/conviction/single")
 * @Transfer\Method("PUT")
 */
class Update extends AbstractCommand
    implements
    FieldType\IdentityInterface,
    FieldType\VersionInterface,
    FieldType\CasesInterface
{
    // Identity & Locking
    use FieldType\Traits\Identity;
    use FieldType\Traits\Version;

    // Foreign Keys
    use FieldType\Traits\Cases;
}
