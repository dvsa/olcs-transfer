<?php

namespace Dvsa\OlcsTest\Transfer\Query\Permits;

use Dvsa\Olcs\Transfer\Query\Permits\UnpaidEcmtPermits;

/**
 * @covers \Dvsa\Olcs\Transfer\Query\Permits\UnpaidEcmtPermits
 */


class UnpaidEcmtPermitsTest extends \PHPUnit\Framework\TestCase
{
    public function testStructure()
    {
        $sut = UnpaidEcmtPermits::create(
            [
              'id' => 1,
              'page' => 1,
              'limit' => 10,
              'status' => 'permit_app_awaiting'
            ]
        );
        static::assertEquals(['id' => 1, 'page' => 1, 'limit' => 10, 'status' => 'permit_app_awaiting'], $sut->getArrayCopy());
    }
}
