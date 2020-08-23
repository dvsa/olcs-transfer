<?php

namespace Dvsa\OlcsTest\Transfer\Query\Partial;

use Dvsa\Olcs\Transfer\Query\PartialMarkup\ById;

/**
 * @covers \Dvsa\Olcs\Transfer\Query\PartialMarkup\ById
 */
class ByIdTest extends \PHPUnit\Framework\TestCase
{
    public function testStructure()
    {
        $sut = ById::create(
            [
              'id' => 2
            ]
        );
        static::assertEquals(
            [
            'id' => 2
            ],
            $sut->getArrayCopy()
        );
    }
}
