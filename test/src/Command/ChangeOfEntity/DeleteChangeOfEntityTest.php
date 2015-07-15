<?php

namespace Dvsa\OlcsTest\Transfer\Command\ChangeOfEntity;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Command\ChangeOfEntity\DeleteChangeOfEntity as Cmd;

/**
 * Delete Change Of Entity command test
 */
class DeleteChangeOfEntityTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $data = [
            'id' => 111,
            'version' => 222,
        ];

        $command = Cmd::create($data);

        $this->assertEquals(111, $command->getId());
        $this->assertEquals(222, $command->getVersion());
    }
}
