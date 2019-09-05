<?php

namespace Dvsa\OlcsTest\Transfer\Command\Permits;

use Dvsa\Olcs\Transfer\Command\Permits\UpdateEcmtRoadworthiness;

/**
 * UpdateEcmtRoadworthiness Test
 */
class UpdateEcmtRoadworthinessTest extends \PHPUnit\Framework\TestCase
{
    public function testStructure()
    {
        $data = [
            'id' => 111,
            'roadworthiness' => 1,
        ];

        $command = UpdateEcmtRoadworthiness::create($data);

        $this->assertEquals(111, $command->getId());
        $this->assertEquals(1, $command->getRoadworthiness());
    }
}
