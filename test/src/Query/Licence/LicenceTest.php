<?php

namespace Dvsa\OlcsTest\Transfer\Query\Licence;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Query\Licence\Licence;

/**
 * Licence test
 */
class LicenceTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $command = Licence::create(['id' => 111, 'foo' => 'bar']);

        $this->assertEquals(111, $command->getId());
    }
}
