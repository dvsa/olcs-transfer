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
            'sectors' => [['AU' => 200]],
            'irhpPermitStock' => '2',
        ];

        $command = Update::create($data);

        $this->assertEquals([['AU' => 200]], $command->getSectors());
        $this->assertEquals('2', $command->getIrhpPermitStock());
    }
}
