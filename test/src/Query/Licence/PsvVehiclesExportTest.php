<?php

namespace Dvsa\OlcsTest\Transfer\Query\Licence;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Query\Licence\PsvVehiclesExport;

/**
 * PSV export vehicles test
 */
class PsvVehiclesExportTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $command = PsvVehiclesExport::create(['id' => 111, 'includeRemoved' => true]);

        $this->assertEquals(111, $command->getId());
        $this->assertTrue($command->getIncludeRemoved());
    }
}
