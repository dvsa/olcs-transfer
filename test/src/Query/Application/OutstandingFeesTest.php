<?php

namespace Dvsa\OlcsTest\Transfer\Query\Application;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Query\Application\OutstandingFees;

/**
 * Outstanding Fees test
 */
class OutstandingFeesTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $command = OutstandingFees::create(['id' => 111, 'foo' => 'bar']);

        $this->assertEquals(111, $command->getId());
    }
}
