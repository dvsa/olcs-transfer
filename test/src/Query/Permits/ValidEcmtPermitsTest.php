<?php

namespace Dvsa\OlcsTest\Transfer\Query\Permits;

use Dvsa\Olcs\Transfer\Query\Permits\ValidEcmtPermits;

/**
 * @covers \Dvsa\Olcs\Transfer\Query\Permits\ValidEcmtPermits
 */


class ValidEcmtPermitsTest extends \PHPUnit\Framework\TestCase
{
    public function testStructure()
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
