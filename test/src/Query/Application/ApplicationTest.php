<?php

namespace Dvsa\OlcsTest\Transfer\Query\Application;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Query\Application\Application;

/**
 * Application test
 */
class ApplicationTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $command = Application::create(['id' => 111, 'foo' => 'bar', 'validateAppCompletion' => true]);

        $this->assertEquals(111, $command->getId());
        $this->assertTrue($command->getValidateAppCompletion());
    }
}
