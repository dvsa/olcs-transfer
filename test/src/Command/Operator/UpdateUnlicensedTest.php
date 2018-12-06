<?php

namespace Dvsa\OlcsTest\Transfer\Command\Operator;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Command\Operator\UpdateUnlicensed as Cmd;

/**
 * Update Unlicensed Operator command test
 */
class UpdateUnlicensedTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $data = [
            'name' => 'Foo Ltd.',
            'operatorType' => 'lcat_psv',
            'trafficArea' => 'B',
            'contactDetails' => ['foo'],
        ];

        $command = Cmd::create($data);

        $this->assertEquals('Foo Ltd.', $command->getName());
        $this->assertEquals('lcat_psv', $command->getOperatorType());
        $this->assertEquals('B', $command->getTrafficArea());
        $this->assertEquals(['foo'], $command->getContactDetails());
    }
}
