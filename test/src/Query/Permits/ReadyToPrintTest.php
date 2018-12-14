<?php

namespace Dvsa\OlcsTest\Transfer\Query\Permits;

use Dvsa\Olcs\Transfer\Query\Permits\ReadyToPrint;

/**
 * ReadyToPrint Test
 */
class ReadyToPrintTest extends \PHPUnit\Framework\TestCase
{
    public function testStructure()
    {
        $sut = ReadyToPrint::create(
            [
                'page' => 1,
                'limit' => 10,
                'sort' => 'id',
                'order' => 'ASC',
            ]
        );
        static::assertEquals(
            ['page' => 1, 'limit' => 10, 'sort' => 'id', 'order' => 'ASC', 'sortWhitelist' => []],
            $sut->getArrayCopy()
        );
    }
}
