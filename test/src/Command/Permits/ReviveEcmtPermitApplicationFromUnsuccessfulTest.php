<?php

namespace Dvsa\OlcsTest\Transfer\Command\Permits;

use Dvsa\Olcs\Transfer\Command\Permits\ReviveEcmtPermitApplicationFromUnsuccessful;

/**
 * Revive ecmt permit application from unsuccessful test
 */
class ReviveEcmtPermitApplicationFromUnsuccessfulTest extends \PHPUnit\Framework\TestCase
{
    public function testStructure()
    {
        $data = ['id' => 113];

        $command = ReviveEcmtPermitApplicationFromUnsuccessful::create($data);

        $this->assertEquals(113, $command->getId());
    }
}
