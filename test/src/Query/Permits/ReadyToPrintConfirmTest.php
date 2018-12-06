<?php

namespace Dvsa\OlcsTest\Transfer\Query\Permits;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Query\Permits\ReadyToPrintConfirm;

/**
 * ReadyToPrintConfirm Test
 */
class ReadyToPrintConfirmTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $sut = ReadyToPrintConfirm::create(
            [
                'ids' => [1, 2, 3],
            ]
        );
        $this->assertEquals([1, 2, 3], $sut->getIds());
        $this->assertEquals(
            ['ids' => [1, 2, 3]],
            $sut->getArrayCopy()
        );
    }
}
