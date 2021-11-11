<?php

declare(strict_types = 1);

namespace Dvsa\OlcsTest\Transfer\Command\Auth;

use Dvsa\Olcs\Transfer\Command\Auth\RefreshToken;
use PHPUnit\Framework\TestCase;

/**
 * @see RefreshToken
 */
class RefreshTokenTest extends TestCase
{
    public function testStructure(): void
    {
        $refreshToken = 'refresh-token';

        $data = ['refreshToken' => $refreshToken];

        $command = RefreshToken::create($data);

        $this->assertEquals($refreshToken, $command->getRefreshToken());
    }
}
