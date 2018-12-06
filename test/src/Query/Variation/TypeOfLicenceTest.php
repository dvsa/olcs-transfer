<?php

namespace Dvsa\OlcsTest\Transfer\Query\Variation;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Query\Variation\TypeOfLicence;

/**
 * Type of licence test
 */
class TypeOfLicenceTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $command = TypeOfLicence::create(['id' => 111, 'foo' => 'bar']);

        $this->assertEquals(111, $command->getId());
    }
}
