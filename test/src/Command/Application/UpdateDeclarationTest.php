<?php

namespace Dvsa\OlcsTest\Transfer\Command\Organisation;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Command\Application\UpdateDeclaration;

/**
 * Update Business Type test
 */
class UpdateDeclarationTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $data = [
            'id' => 111,
            'version' => 222,
            'declarationConfirmation' => 'Y',
            'interimRequested' => 'N',
            'interimReason' => 'foobar',
        ];

        $command = UpdateDeclaration::create($data);

        $this->assertEquals(111, $command->getId());
        $this->assertEquals(222, $command->getVersion());
        $this->assertEquals('Y', $command->getDeclarationConfirmation());
        $this->assertEquals('N', $command->getInterimRequested());
        $this->assertEquals('foobar', $command->getInterimReason());
    }
}
