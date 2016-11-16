<?php

namespace Dvsa\OlcsTest\Transfer\Command\Licence;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Command\Licence\PrintLicence;

/**
 * @covers \Dvsa\Olcs\Transfer\Command\Licence\PrintLicence
 */
class PrintLicenceTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $data = [
            'id' => 111,
        ];

        $command = PrintLicence::create($data);

        $this->assertEquals(111, $command->getId());
    }
}
