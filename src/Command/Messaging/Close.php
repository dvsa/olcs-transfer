<?php

declare(strict_types=1);

/**
 * Close conversation
 */

namespace Dvsa\Olcs\Transfer\Command\Messaging;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\FieldType\Traits\Conversation;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/messaging/conversations/close")
 * @Transfer\Method("POST")
 */
final class Close extends AbstractCommand
{
    use Identity;
}
