<?php

namespace Dvsa\OlcsTest\Transfer\Command\Messaging;

use Dvsa\Olcs\Transfer\Command\Fee\RejectWaive;

/**
 * Reject Waive test
 */
class Close extends \PHPUnit\Framework\TestCase
{
    public function testStructure()
    {
        $data = [
            'id' => 111,
        ];

        $command = \Dvsa\Olcs\Transfer\Command\Messaging\Close::create($data);

        $this->assertEquals(111, $command->getId());
    }
}
