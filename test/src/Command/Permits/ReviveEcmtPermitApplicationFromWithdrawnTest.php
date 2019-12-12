<?php

namespace Dvsa\OlcsTest\Transfer\Command\Permits;

use Dvsa\Olcs\Transfer\Command\Permits\ReviveEcmtPermitApplicationFromWithdrawn;

/**
 * Revive ecmt permit application from withdrawn test
 */
class ReviveEcmtPermitApplicationFromWithdrawnTest extends \PHPUnit\Framework\TestCase
{
    public function testStructure()
    {
        $data = ['id' => 113];

        $command = ReviveEcmtPermitApplicationFromWithdrawn::create($data);

        $this->assertEquals(113, $command->getId());
    }
}
