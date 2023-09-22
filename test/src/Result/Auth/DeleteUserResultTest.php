<?php

declare(strict_types=1);

namespace Dvsa\OlcsTest\Transfer\Result\Auth;

use Dvsa\Olcs\Transfer\Result\Auth\DeleteUserResult;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class DeleteUserResultTest extends TestCase
{
    /**
     * @test
     */
    public function __construct_ThrowsInvalidArgumentException_WhenCodeIsNotValid()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('999 is not a valid code');

        new DeleteUserResult(999);
    }

    /**
     * @test
     * @dataProvider validCodeDataProvider
     */
    public function __construct_CreatesInstance_WhenCodeIsValid(int $code)
    {
        $this->assertInstanceOf(DeleteUserResult::class, new DeleteUserResult($code));
    }

    /**
     * @test
     * @dataProvider validCodeDataProvider
     */
    public function isValid_ReturnsExpectedResponse(int $code, bool $isValid)
    {
        $result = new DeleteUserResult($code);
        $this->assertSame($isValid, $result->isValid());
    }

    public function validCodeDataProvider()
    {
        return [
            'Success' => [DeleteUserResult::SUCCESS, true],
            'Failure' => [DeleteUserResult::FAILURE, false],
            'Failure user not found' => [DeleteUserResult::FAILURE_USER_NOT_FOUND, false],
        ];
    }

    /**
     * @test
     * @dataProvider notPresentCodeDataProvider
     */
    public function notPresent_ReturnsExpectedResponse(int $code, bool $isValid)
    {
        $result = new DeleteUserResult($code);
        $this->assertSame($isValid, $result->isUserNotPresent());
    }

    public function notPresentCodeDataProvider()
    {
        return [
            'Success' => [DeleteUserResult::SUCCESS, false],
            'Failure' => [DeleteUserResult::FAILURE, false],
            'Failure user not found' => [DeleteUserResult::FAILURE_USER_NOT_FOUND, true],
        ];
    }
}
