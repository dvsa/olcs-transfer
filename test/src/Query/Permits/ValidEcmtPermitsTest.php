<?php

namespace Dvsa\OlcsTest\Transfer\Query\Permits;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Query\Permits\ValidEcmtPermits;

/**
 * @covers \Dvsa\Olcs\Transfer\Query\Permits\ValidEcmtPermits
 */


class ValidEcmtPermitsTest extends PHPUnit_Framework_TestCase
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
