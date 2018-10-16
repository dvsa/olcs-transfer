<?php

namespace Dvsa\OlcsTest\Transfer\Command\TransportManagerApplication;

use Dvsa\Olcs\Transfer\Command\TransportManagerApplication\SendTmApplication;

class SendTmApplicationTest extends \PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $data = [
            'id' => 5,
            'emailAddress' => 'test@test.com'
        ];

        $command = SendTmApplication::create($data);

        static::assertEquals($command->getEmailAddress(), 'test@test.com');
        static::assertEquals($command->getId(), 5);
    }
}
