<?php

namespace Dvsa\OlcsTest\Transfer\Query\Document;

use Dvsa\Olcs\Transfer\Query\Document\PrintLetter;

/**
 * @covers \Dvsa\Olcs\Transfer\Query\Document\PrintLetter
 */
class PrintLetterTest extends \PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $qry = PrintLetter::create(
            [
                'id' => 'unit_id',
            ]
        );

        static::assertEquals('unit_id', $qry->getId());
    }
}
