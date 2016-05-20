<?php

namespace Dvsa\Olcs\Transfer\Command\Cases\Si;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldType;

/**
 * @Transfer\RouteName("backend/case-si/send-response")
 * @Transfer\Method("POST")
 */
class SendResponse extends AbstractCommand
{
    use FieldType\Cases;
}
