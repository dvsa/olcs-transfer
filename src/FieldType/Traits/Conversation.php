<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait Conversation
 *
 * @package Dvsa\Olcs\Transfer\FieldType\Traits
 */
trait Conversation
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $conversation;

    /**
     * @return int
     */
    public function getConversation()
    {
        return $this->conversation;
    }
}