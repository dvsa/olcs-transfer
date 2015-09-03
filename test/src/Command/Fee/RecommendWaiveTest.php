<?php

namespace Dvsa\OlcsTest\Transfer\Command\Fee;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Command\Fee\RecommendWaive;

/**
 * Recommend Waive test
 */
class RecommendWaiveTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $data = [
            'id' => 111,
            'version' => 1,
            'waiveReason' => 'foo',
        ];

        $command = RecommendWaive::create($data);

        $this->assertEquals(111, $command->getId());
        $this->assertEquals(1, $command->getVersion());
        $this->assertEquals('foo', $command->getWaiveReason());
    }
}
