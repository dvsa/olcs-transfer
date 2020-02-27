<?php

namespace Dvsa\OlcsTest\Transfer\Query\IrhpApplication;

use Dvsa\Olcs\Transfer\Query\IrhpApplication\InternalIssuedPermitsSummary;

/**
 * @covers \Dvsa\Olcs\Transfer\Query\IrhpApplication\InternalIssuedPermitsSummary
 */

class InternalIssuedPermitsSummaryTest extends \PHPUnit\Framework\TestCase
{
    public function testStructure()
    {
        $sut = InternalIssuedPermitsSummary::create(
            [
              'licence' => 15,
            ]
        );
        $this->assertEquals(15, $sut->getLicence());
        $this->assertEquals(
            [
                'licence' => 15,
            ],
            $sut->getArrayCopy()
        );
    }
}
