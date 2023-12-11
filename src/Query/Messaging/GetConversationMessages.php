<?php

namespace Dvsa\Olcs\Transfer\Query\Messaging;

use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedTrait;
use Dvsa\Olcs\Transfer\FieldType\Traits\Licence;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/messaging/conversation-messages")
 */
final class GetConversationMessages extends AbstractQuery implements PagedQueryInterface
{
    use PagedTrait;
    use Licence;

    /**
     * @var int
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $conversation;

    /**
     * Get conversation
     *
     * @return int
     */
    public function getConversation()
    {
        return $this->conversation;
    }
}
