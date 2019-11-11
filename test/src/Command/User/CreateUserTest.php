<?php

namespace Dvsa\OlcsTest\Transfer\Command\User;

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
        return [
            'translateToWelsh',
            'team',
            'application',
            'transportManager',
            'localAuthority',
            'partnerContactDetails',
            'osType'
        ];
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
                'windows_7',
                'windows_10'
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
            'loginId' => [['local-authority ', 'local-authority']],
            'osType' => [['windows_71 ', 'windows_71'," windows_10"]],
            'userType' => [['partner ', 'partner']],
            'application' => [[54, '54']],
            'transportManager' => [[7, '7']],
            'localAuthority' => [[11, '11']],
            'partnerContactDetails' => [[12, '12']]
        ];
    }
}
