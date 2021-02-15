<?php

namespace Dvsa\OlcsTest\Transfer\Command\TransportManagerApplication;

use Dvsa\Olcs\Transfer\Command\TransportManagerApplication\SendAmendTmApplication;
use Dvsa\OlcsTest\Transfer\Command\CommandTest;
use Dvsa\OlcsTest\Transfer\DtoWithoutOptionalFieldsTest;

class SendAmendTmApplicationTest extends \PHPUnit\Framework\TestCase
{
    use CommandTest, DtoWithoutOptionalFieldsTest {
        DtoWithoutOptionalFieldsTest::testDefaultValues insteadof CommandTest;
    }

    protected function createBlankDto()
    {
        return new SendAmendTmApplication();
    }

    protected function getValidFieldValues()
    {
        return [
            'emailAddress' => ['test@test.com', 'kajshkj_jsahk@kfjsdsd.com'],
            'id' => ['5', '3']
        ];
    }

    protected function getInvalidFieldValues()
    {
        return [
            'id' => ['unexpected' => 'string'],
            'emailAddress' => ['unexpected' => 'string']
        ];
    }

    protected function getFilterTransformations()
    {
        return [
            'emailAddress' => [['test@test.com ', 'test@test.com']],
            'id' => [[8, '8']]
        ];
    }
}
