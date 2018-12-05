<?php

namespace Dvsa\OlcsTest\Transfer\Command\Operator;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Command\Permits\StoreEcmtPermitApplicationSnapshot as Cmd;

/**
 * StoreEcmtPermitApplicationSnapshotTest
 */
class StoreEcmtPermitApplicationSnapshotTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $data = [
            'id' => 2,
            'html' => 'HTML',
        ];

        $command = Cmd::create($data);

        $this->assertEquals(2, $command->getId());
        $this->assertEquals('HTML', $command->getHtml());
    }
}
