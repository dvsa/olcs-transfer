<?php

namespace Dvsa\OlcsTest\Transfer\Command\Application;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Command\Application\Grant;

/**
 * Grant test
 */
class GrantTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $data = [
            'id' => 111,
            'shouldCreateInspectionRequest' => false,
            'dueDate' => 3,
            'notes' => 'foo',
        ];

        $command = Grant::create($data);

        $this->assertEquals(111, $command->getId());
        $this->assertFalse($command->getShouldCreateInspectionRequest());
        $this->assertEquals(3, $command->getDueDate());
        $this->assertEquals('foo', $command->getNotes());
    }
}
