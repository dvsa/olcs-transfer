<?php

namespace Dvsa\OlcsTest\Transfer\Command\Fee;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Command\Fee\UpdateFee;

/**
 * Update Business Type test
 */
class UpdateFeeTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $data = [
            'id' => 111,
            'version' => 1,
            'waiveReason' => 'foo',
            'status' => 'lfs_ot'
        ];

        $command = UpdateFee::create($data);

        $this->assertEquals(111, $command->getId());
        $this->assertEquals(1, $command->getVersion());
        $this->assertEquals('foo', $command->getWaiveReason());
        $this->assertEquals('lfs_ot', $command->getStatus());
    }
}
