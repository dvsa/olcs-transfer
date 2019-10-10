<?php

namespace Dvsa\OlcsTest\Transfer\Command\Transaction;

use Dvsa\Olcs\Transfer\Command\User\CreateUser;
use Dvsa\OlcsTest\Transfer\Command\CommandTest;
use PHPUnit\Framework\TestCase;

/**
 * Pay Outstanding Fees test
 */
class CreateUserTest extends TestCase
{
    use CommandTest;

    protected function createBlankDto()
    {
        return new CreateUser();
    }

    protected function getOptionalDtoFields()
    {
        return [];
    }

    protected function getValidFieldValues()
    {
        return [
            'userType' => [
                "internal",
                "local-authority",
                "partner",
                "operator",
                "transport-manager"
            ],
            'licenceNumber' => [
                '12',
                str_repeat('a', 18)
            ],
            'roles' => [
                [
                    "system-admin",
                    "internal-limited-read-only",
                    "internal-read-only",
                    "internal-case-worker",
                    "internal-admin",
                    "operator-admin",
                    "operator-user",
                    "operator-tm",
                    "partner-admin",
                    "partner-user",
                    "local-authority-admin",
                    "local-authority-user"
                ]
            ],
            'osType' => [
                'os_type_windows_7',
                'os_type_windows_10'
            ]
        ];
    }

    protected function getInvalidFieldValues()
    {
        return [
            'userType' => ["incorrect", ['unexpected' => 'array']],
            'licenceNumber' => ['1', str_repeat('a', 19)],
            'roles' => [["wrong_role"], ['unexpected' => 'array']],
            'osType' => ["incorrect", ['unexpected' => 'array']]
        ];
    }


    protected function getFilterTransformations()
    {
        return [

        ];
    }
}
