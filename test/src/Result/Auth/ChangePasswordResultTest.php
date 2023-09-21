<?php
declare(strict_types=1);

namespace Dvsa\OlcsTest\Transfer\Result\Auth;

use Dvsa\Olcs\Transfer\Result\Auth\ChangePasswordResult;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ChangePasswordResultTest extends TestCase
{
    /**
     * @test
     */
    public function construct_ThrowsInvalidArgumentException_WhenCodeIsNotValid(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('999 is not a valid code');

        new ChangePasswordResult(999);
    }

    /**
     * @test
     */
    public function fromArray_ThrowsInvalidArgumentException_WhenCodeIsNotValid(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('999 is not a valid code');

        ChangePasswordResult::fromArray(['code' => 999, 'message' => '']);
    }

    /**
     * @test
     * @dataProvider validCodeDataProvider
     */
    public function construct_CreatesInstance_WhenCodeIsValid(int $code): void
    {
        $this->assertInstanceOf(ChangePasswordResult::class, new ChangePasswordResult($code));
    }

    public function validCodeDataProvider(): array
    {
        return [
            'Success' => [ChangePasswordResult::SUCCESS, true],
            'Failure' => [ChangePasswordResult::FAILURE, false],
            'Failure new password invalid' => [ChangePasswordResult::FAILURE_NEW_PASSWORD_INVALID, false],
            'Failure client error' => [ChangePasswordResult::FAILURE_CLIENT_ERROR, false],
            'Failure not authorized' => [ChangePasswordResult::FAILURE_NOT_AUTHORIZED, false],
            'Failure old password invalid' => [ChangePasswordResult::FAILURE_OLD_PASSWORD_INVALID, false],
            'Failure password reuse' => [ChangePasswordResult::FAILURE_PASSWORD_REUSE, false],
        ];
    }

    /**
     * @test
     * @dataProvider validCodeDataProvider
     */
    public function isValid_ReturnsExpectedResponse(int $code, bool $isValid): void
    {
        $result = new ChangePasswordResult($code);

        $this->assertSame($isValid, $result->isValid());
    }
}
