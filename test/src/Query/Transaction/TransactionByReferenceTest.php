<?php

namespace Dvsa\OlcsTest\Transfer\Query\Transaction;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Query\Transaction\TransactionByReference;

/**
 * Transaction by reference Test
 */
class TransactionByReferenceTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $query = TransactionByReference::create(['reference' => 'OLCS-1234-ABCD', 'foo' => 'bar']);

        $this->assertEquals('OLCS-1234-ABCD', $query->getReference());
    }
}
