<?php

namespace Dvsa\OlcsTest\Transfer\Command\Document;

use Dvsa\Olcs\Transfer\Command\Document\PrintLetter;

/**
 * @covers \Dvsa\Olcs\Transfer\Command\Document\PrintLetter
 */
class PrintLetterTest extends \PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $command = PrintLetter::create(
            [
                'id' => 'unit_id',
                'method' => 'unit_method',
            ]
        );

        static::assertEquals('unit_id', $command->getId());
        static::assertEquals('unit_method', $command->getMethod());
    }
}
