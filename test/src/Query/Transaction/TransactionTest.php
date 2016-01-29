<?php

namespace Dvsa\OlcsTest\Transfer\Query\Transaction;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Query\Transaction\Transaction;

/**
 * Transaction Test
 */
class TransactionTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $query = Transaction::create(['id' => 111, 'foo' => 'bar']);

        $this->assertEquals(111, $query->getId());
    }
}
