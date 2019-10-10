<?php

namespace Dvsa\OlcsTest\Transfer\Command\Transaction;

use Dvsa\Olcs\Transfer\Command\User\UpdateUser;
use Dvsa\OlcsTest\Transfer\Command\CommandTest;
use PHPUnit\Framework\TestCase;

/**
 * Pay Outstanding Fees test
 */
class UpdateUserTest extends TestCase
{
    use CommandTest;

    protected function createBlankDto()
    {
        return new UpdateUser();
    }

    protected function getOptionalDtoFields()
    {
        return [];
    }

    protected function getValidFieldValues()
    {
        return [
            'id' => ['1', '2'],
            'version' => ['1', '2'],
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
            'accountDisabled' => ['Y', 'N'],
            'resetPassword' => ['post', 'email'],
            'osType' => [
                'windows_7',
                'windows_10'
            ]
        ];
    }

    protected function getInvalidFieldValues()
    {
        return [
            'id' => ['string', ['unexpected' => 'array']],
            'version' => ['string', ['unexpected' => 'array']],
            'userType' => ["incorrect", ['unexpected' => 'array']],
            'licenceNumber' => ['1', str_repeat('a', 19)],
            'roles' => [["wrong_role"], ['unexpected' => 'array']],
            'accountDisabled' => ['string', ['unexpected' => 'array']],
            'resetPassword' => ['string', ['unexpected' => 'array']],
            'osType' => ["incorrect", ['unexpected' => 'array']]
        ];
    }


    protected function getFilterTransformations()
    {
        return [
            'id' => [[99, '99']],
            'version' => [[99, '99']],
        ];
    }
}
