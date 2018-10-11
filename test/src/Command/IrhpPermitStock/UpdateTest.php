<?php

namespace Dvsa\OlcsTest\Transfer\Command\IrhpPermitSector;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Command\IrhpPermitSector\Update;

/**
 * Update test
 */
class UpdateTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {

        $data = [
            'sectors' => ['AU'],
            'irhpPermitStock' => '2',
        ];

        $command = Update::create($data);

        $this->assertEquals(['AU'], $command->getSectors());
        $this->assertEquals('2', $command->getIrhpPermitStock());
    }
}
