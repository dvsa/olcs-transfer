<?php

namespace Dvsa\OlcsTest\Transfer\Query\Permits;

use Dvsa\Olcs\Transfer\Query\Permits\EcmtApplicationIssueFeePerPermit;

/**
 * ECMT Application issue fee per permit test
 */
class EcmtApplicationIssueFeePerPermitTest extends \PHPUnit\Framework\TestCase
{
    public function testStructure()
    {
        $query = EcmtApplicationIssueFeePerPermit::create(['id' => 45]);

        $this->assertEquals(45, $query->getId());
    }
}
