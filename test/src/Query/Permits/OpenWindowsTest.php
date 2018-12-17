<?php

namespace Dvsa\OlcsTest\Transfer\Query\Permits;

use Dvsa\Olcs\Transfer\Query\Permits\OpenWindows;

/**
 * Open Windows test
 */
class OpenWindowsTest extends \PHPUnit\Framework\TestCase
{
    public function testStructure()
    {
        $query = OpenWindows::create(['currentDateTime' => '2017-02-03 15:11:43']);

        $this->assertEquals(
            '2017-02-03 15:11:43',
            $query->getCurrentDateTime()
        );
    }
}
