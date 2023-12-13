<?php

namespace Dvsa\Olcs\Transfer\Command\Messaging;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits\Conversation;

/**
 * @Transfer\RouteName("backend/messaging/messages")
 * @Transfer\Method("POST")
 */
final class CreateMessage extends AbstractCommand
{
    use Conversation;

    /**
     * @Transfer\Filter("Laminas\Filter\StringTrim")
     * @Transfer\Validator("Laminas\Validator\StringLength", options={"max":3000})
     */
    protected $messageContent;

    public function getMessageContent()
    {
        return $this->messageContent;
    }
}
