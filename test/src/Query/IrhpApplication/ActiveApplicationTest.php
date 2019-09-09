<?php

namespace Dvsa\OlcsTest\Transfer\Query\IrhpApplication;

use Dvsa\Olcs\Transfer\Query\IrhpApplication\ActiveApplication;

/**
 * @covers \Dvsa\Olcs\Transfer\Query\IrhpApplication\ActiveApplication
 */
class ActiveApplicationTest extends \PHPUnit\Framework\TestCase
{
    public function testStructure()
    {
        $sut = ActiveApplication::create(
            [
                'licence' => 1,
                'irhpPermitType' => 1,
                'year' => '2021',
            ]
        );
        static::assertEquals(
            [
                'licence' => 1,
                'irhpPermitType' => 1,
                'year' => '2021',
            ],
            $sut->getArrayCopy()
        );
    }
}
