<?php
declare(strict_types=1);

namespace Dvsa\Olcs\Transfer\Result\Auth;

use InvalidArgumentException;

class ChangePasswordResult
{
    public const SUCCESS = 1;

    public const FAILURE = 0;
    public const FAILURE_NEW_PASSWORD_INVALID = -1;
    public const FAILURE_CLIENT_ERROR = -2;
    public const FAILURE_NOT_AUTHORIZED = -3;
    public const FAILURE_OLD_PASSWORD_INVALID = -4;
    public const FAILURE_PASSWORD_REUSE = -5;

    public const MESSAGE_OLD_PASSWORD_INVALID = 'auth.change-password.failed.reason.Old password is incorrect.';
    public const MESSAGE_PASSWORD_REUSE = 'auth.change-password.failed.reason.The password must be different. Try again.';

    private int $code;
    private ?string $message;

    public function __construct(int $code, ?string $message = null)
    {
        if (!$this->isValidCode($code)) {
            throw new InvalidArgumentException(sprintf("%d is not a valid code", $code));
        }

        $this->code = $code;
        $this->message = $message;
    }

    public function isValid(): bool
    {
        return ($this->code === static::SUCCESS);
    }

    public function isValidCode(int $code): bool
    {
        $reflectionClass = new \ReflectionClass($this);
        foreach ($reflectionClass->getConstants() as $value) {
            if ($value === $code) {
                return true;
            }
        }

        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param array $data
     * @return ChangePasswordResult
     */
    public static function fromArray(array $data): ChangePasswordResult
    {
        return new static(
            $data['code'] ?? null,
            $data['message'] ?? null,
        );
    }
}
