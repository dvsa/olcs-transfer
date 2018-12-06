<?php

namespace Dvsa\OlcsTest\Transfer\Query\Application;

use Dvsa\Olcs\Transfer\Query\System\InfoMessage\GetListActive;
use PHPUnit_Framework_TestCase;

/**
 * @covers Dvsa\Olcs\Transfer\Query\System\InfoMessage\GetListActive
 */
class GetListActiveTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $query = GetListActive::create(['isInternal' => true]);

        static::assertEquals(true, $query->isInternal());
    }
}
