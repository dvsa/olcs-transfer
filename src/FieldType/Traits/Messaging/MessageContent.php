<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits\Messaging;

trait MessageContent
{
    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength", "options": {"min": 0}})
     */
    protected $messageContent;

    public function getMessageContent()
    {
        return $this->messageContent;
    }
}
