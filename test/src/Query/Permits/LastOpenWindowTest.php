<?php

namespace Dvsa\OlcsTest\Transfer\Query\Permits;

use Dvsa\Olcs\Transfer\Query\Permits\LastOpenWindow;

/**
 * Last Open Window test
 */
class LastOpenWindowTest extends \PHPUnit\Framework\TestCase
{
    public function testStructure()
    {
        $query = LastOpenWindow::create(['currentDateTime' => '2018-05-25 12:03:11']);

        $this->assertEquals(
            '2018-05-25 12:03:11',
            $query->getCurrentDateTime()
        );
    }
}
