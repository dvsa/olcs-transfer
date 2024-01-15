<?php

namespace Dvsa\Olcs\Transfer\Query\Messaging\Messages;

use Dvsa\Olcs\Transfer\FieldType\Traits\Messaging\Conversation;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\PagedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedTrait;

/**
 * @Transfer\RouteName("backend/messaging/messages/by-conversation")
 */
final class ByConversation extends AbstractQuery implements PagedQueryInterface
{
    use PagedTrait;
    use Conversation;
}
