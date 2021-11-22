<?php
declare(strict_types=1);

namespace Dvsa\OlcsTest\Transfer\Result\Auth;

use Dvsa\Olcs\Transfer\Result\Auth\ChangeExpiredPasswordResult;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ChangeExpiredPasswordResultTest extends TestCase
{
    /**
     * @test
     */
    public function __construct_ThrowsInvalidArgumentException_WhenCodeIsNotValid()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage('999 is not a valid code');

        new ChangeExpiredPasswordResult(999);
    }

    /**
     * @test
     * @dataProvider validCodeDataProvider
     */
    public function __construct_CreatesInstance_WhenCodeIsValid(int $code)
    {
        $this->assertInstanceOf(ChangeExpiredPasswordResult::class, new ChangeExpiredPasswordResult($code));
    }

    public function validCodeDataProvider()
    {
        return [
            'Success' => [ChangeExpiredPasswordResult::SUCCESS, true],
            'Success with challenge' => [ChangeExpiredPasswordResult::SUCCESS_WITH_CHALLENGE, true],
            'Failure' => [ChangeExpiredPasswordResult::FAILURE, false],
            'Failure new password invalid' => [ChangeExpiredPasswordResult::FAILURE_NEW_PASSWORD_INVALID, false],
            'failure not authorized' => [ChangeExpiredPasswordResult::FAILURE_NOT_AUTHORIZED, false],
            'failure client error' => [ChangeExpiredPasswordResult::FAILURE_CLIENT_ERROR, false],
        ];
    }

    /**
     * @test
     * @dataProvider validCodeDataProvider
     */
    public function isValid_ReturnsExpectedResponse(int $code, bool $isValid)
    {
        $result = new ChangeExpiredPasswordResult($code);

        $this->assertSame($isValid, $result->isValid());
    }
}
