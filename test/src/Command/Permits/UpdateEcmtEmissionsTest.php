<?php

namespace Dvsa\OlcsTest\Transfer\Command\Permits;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Command\Permits\UpdateEcmtEmissions;

/**
 * Overview test
 */
class UpdateEcmtEmissionsTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $data = [
            'id' => 111,
            'emissions' => 1,
        ];

        $command = UpdateEcmtEmissions::create($data);

        $this->assertEquals(111, $command->getId());
        $this->assertEquals(1, $command->getEmissions());
    }
}
