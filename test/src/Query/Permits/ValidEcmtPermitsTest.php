<?php

namespace Dvsa\OlcsTest\Transfer\Query\Permits;

use Mockery as m;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use Dvsa\Olcs\Transfer\Query\Permits\ValidEcmtPermits;

/**
 * @covers \Dvsa\Olcs\Transfer\Query\Permits\ValidEcmtPermits
 */


class ValidEcmtPermitsTest extends MockeryTestCase
{
    public function testValidEcmtPermits()
    {
        $sut = ValidEcmtPermits::create(
            [
              'id' => 1,
              'page' => 1,
              'limit' => 10
            ]
        );
        static::assertEquals(['id' => 1, 'page' => 1, 'limit' => 10], $sut->getArrayCopy());
    }
}
