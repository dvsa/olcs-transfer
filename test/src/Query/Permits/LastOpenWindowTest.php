<?php

namespace Dvsa\OlcsTest\Transfer\Query\Permits;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Query\Permits\LastOpenWindow;

/**
 * Last Open Window test
 */
class LastOpenWindowTest extends PHPUnit_Framework_TestCase
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
