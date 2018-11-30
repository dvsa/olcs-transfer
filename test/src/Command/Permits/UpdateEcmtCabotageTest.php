<?php

namespace Dvsa\OlcsTest\Transfer\Command\Permits;

use Dvsa\Olcs\Transfer\Command\Permits\UpdateEcmtCabotage;

/**
 * Overview test
 */
class UpdateEcmtCabotageTest extends \PHPUnit\Framework\TestCase
{
    public function testStructure()
    {
        $data = [
            'id' => 111,
            'cabotage' => 1,
        ];

        $command = UpdateEcmtCabotage::create($data);

        $this->assertEquals(111, $command->getId());
        $this->assertEquals(1, $command->getCabotage());
    }
}
