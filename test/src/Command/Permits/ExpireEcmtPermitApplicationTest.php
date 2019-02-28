<?php

namespace Dvsa\OlcsTest\Transfer\Command\Permits;

use Dvsa\Olcs\Transfer\Command\Permits\ExpireEcmtPermitApplication;

/**
 * Set EcmtPermitApplication status to expired test
 */
class ExpireEcmtPermitApplicationTest extends \PHPUnit\Framework\TestCase
{
    public function testStructure()
    {
        $data = [ 'id' => 1 ];
        $command = ExpireEcmtPermitApplication::create($data);
        $this->assertEquals(1, $command->getId());
    }
}
