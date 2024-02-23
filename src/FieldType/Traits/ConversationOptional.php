<?php

declare(strict_types=1);

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

trait ConversationOptional
{
    /**
     * @var int
     * @Transfer\Optional
     * @Transfer\Filter("Laminas\Filter\Digits")
     * @Transfer\Validator("Laminas\Validator\Digits")
     * @Transfer\Validator("Laminas\Validator\GreaterThan", options={"min": 0})
     */
    protected $conversation = null;

    public function getConversation(): ?int
    {
        return $this->conversation ? (int)$this->conversation : null;
    }

    /** @param int $conversationId */
    public function setConversation($conversationId)
    {
        $this->conversation = $conversationId ? (int)$conversationId : null;
    }
}
