<?php

declare(strict_types = 1);

namespace Dvsa\OlcsTest\Transfer\Command\Auth;

use Dvsa\Olcs\Transfer\Command\Auth\ChangePassword;

/**
 * @see ChangePassword
 */
class ChangePasswordTest extends \PHPUnit\Framework\TestCase
{
    public function testStructure(): void
    {
        $password = 'password';
        $newPassword = 'new password';
        $realm = 'realm';

        $data = [
            'password' => $password,
            'newPassword' => $newPassword,
            'realm' => $realm,
        ];

        $command = ChangePassword::create($data);

        $this->assertEquals($password, $command->getPassword());
        $this->assertEquals($newPassword, $command->getNewPassword());
        $this->assertEquals($realm, $command->getRealm());
    }
}
