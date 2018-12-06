<?php

namespace Dvsa\OlcsTest\Transfer\Command\ContactDetail\PhoneContact;

use Dvsa\Olcs\Transfer\Command\ContactDetail\PhoneContact\Delete;
use PHPUnit_Framework_TestCase;

/**
 * @covers Dvsa\Olcs\Transfer\Command\ContactDetail\PhoneContact\Delete
 */
class DeleteTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $id = 9999;

        /** @var Delete $command */
        $command = Delete::create(['id' => $id]);

        static::assertEquals($id, $command->getId());
    }
}
