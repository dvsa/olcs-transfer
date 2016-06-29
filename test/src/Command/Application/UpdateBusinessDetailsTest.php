<?php

namespace Dvsa\OlcsTest\Transfer\Command\Application;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Command\Application\UpdateBusinessDetails;

/**
 * @covers Dvsa\Olcs\Transfer\Command\Application\UpdateBusinessDetails 
 */
class UpdateBusinessDetailsTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $data = [
            'licence' => 7777,
        ];

        $command = UpdateBusinessDetails::create($data);

        static::assertEquals(7777, $command->getLicence());
    }
}
