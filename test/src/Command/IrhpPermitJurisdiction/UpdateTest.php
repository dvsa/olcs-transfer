<?php

namespace Dvsa\OlcsTest\Transfer\Command\IrhpPermitJurisdiction;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Command\IrhpPermitJurisdiction\Update;

/**
 * Update test
 */
class UpdateTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $data = [
            'trafficAreas' => [['B' => 100]],
        ];

        $command = Update::create($data);

        $this->assertEquals([['B' => 100]], $command->getTrafficAreas());
    }
}
