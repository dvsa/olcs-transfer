<?php

namespace Dvsa\Olcs\Transfer\Command\Cases\Conviction;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

use Dvsa\Olcs\Transfer\FieldType as FieldType;

/**
 * @Transfer\RouteName("backend/conviction")
 * @Transfer\Method("POST")
 */
class Create extends AbstractCommand
    implements
    FieldType\CasesInterface
{
    use FieldType\Traits\Cases;
}
