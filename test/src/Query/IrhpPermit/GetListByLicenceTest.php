<?php

namespace Dvsa\OlcsTest\Transfer\Query\IrhpPermit;

use Dvsa\Olcs\Transfer\Query\IrhpPermit\GetListByLicence;

/**
 * @covers \Dvsa\Olcs\Transfer\Query\IrhpPermit\GetListByEcmtId
 */


class GetListByLicenceTest extends \PHPUnit\Framework\TestCase
{
    public function testStructure()
    {
        $sut = GetListByLicence::create(
            [
              'licence' => 7,
              'page' => 1,
              'limit' => 10,

            ]
        );
        static::assertEquals(
            [
            'licence' => 7,
            'page' => 1,
            'limit' => 10,
            ],
            $sut->getArrayCopy()
        );
    }
}
