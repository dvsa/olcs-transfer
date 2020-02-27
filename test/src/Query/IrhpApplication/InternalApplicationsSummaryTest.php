<?php

namespace Dvsa\OlcsTest\Transfer\Query\IrhpApplication;

use Dvsa\Olcs\Transfer\Query\IrhpApplication\InternalApplicationsSummary;

/**
 * @covers \Dvsa\Olcs\Transfer\Query\IrhpApplication\InternalApplicationsSummary
 */

class InternalApplicationsSummaryTest extends \PHPUnit\Framework\TestCase
{
    public function testStructure()
    {
        $sut = InternalApplicationsSummary::create(
            [
              'licence' => 14,
            ]
        );
        $this->assertEquals(14, $sut->getLicence());
        $this->assertEquals(
            [
                'licence' => 14,
            ],
            $sut->getArrayCopy()
        );
    }
}
