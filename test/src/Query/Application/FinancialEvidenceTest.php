<?php

namespace Dvsa\OlcsTest\Transfer\Query\Organisation;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Query\Application\FinancialEvidence;

/**
 * Financial Evidence Test
 */
class FinancialEvidenceTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $command = FinancialEvidence::create(['id' => 111, 'foo' => 'bar']);

        $this->assertEquals(111, $command->getId());
    }
}
