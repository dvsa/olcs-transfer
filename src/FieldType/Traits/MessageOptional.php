<?php

declare(strict_types=1);

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

trait MessageOptional
{
    /**
     * @var int
     * @Transfer\Optional
     * @Transfer\Filter("Laminas\Filter\Digits")
     * @Transfer\Validator("Laminas\Validator\Digits")
     * @Transfer\Validator("Laminas\Validator\GreaterThan", options={"min": 0})
     */
    protected $message = null;

    public function getMessage(): ?int
    {
        return $this->message ? (int)$this->message : null;
    }

    /** @param int $messageId */
    public function setMessage($messageId)
    {
        $this->message = $messageId ? (int)$messageId : null;
    }
}
