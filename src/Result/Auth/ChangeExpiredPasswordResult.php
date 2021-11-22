<?php
declare(strict_types=1);

namespace Dvsa\Olcs\Transfer\Result\Auth;

use InvalidArgumentException;

class ChangeExpiredPasswordResult
{
    public const SUCCESS = 1;
    public const SUCCESS_WITH_CHALLENGE = 2;

    public const FAILURE = 0;
    public const FAILURE_NEW_PASSWORD_INVALID = -1;
    public const FAILURE_CLIENT_ERROR = -2;
    public const FAILURE_NOT_AUTHORIZED = -3;

    /**
     * @var int
     */
    protected int $code;

    /**
     * @var mixed
     */
    protected array $identity;

    /**
     * @var array
     */
    protected array $messages;

    /**
     * @var array
     */
    private array $options;

    /**
     * Sets the result code, identity, and failure messages
     *
     * @param int $code
     * @param mixed $identity
     * @param array $messages
     * @param array $options
     */
    public function __construct(int $code, array $identity = [], array $messages = [], array $options = [])
    {
        if (!$this->isValidCode($code)) {
            throw new InvalidArgumentException(sprintf("%d is not a valid code", $code));
        }

        $this->code     = $code;
        $this->identity = $identity;
        $this->messages = $messages;
        $this->options = $options;
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return ($this->code > 0);
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @return mixed
     */
    public function getIdentity(): array
    {
        return $this->identity;
    }

    /**
     * @return array
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @param int $code
     * @return bool
     */
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
     * @param array $data
     * @return ChangeExpiredPasswordResult
     */
    public static function fromArray(array $data): ChangeExpiredPasswordResult
    {
        return new static(
            $data['code'] ?? null,
            $data['identity'] ?? [],
            $data['messages'] ?? [],
            $data['options'] ?? []
        );
    }
}
