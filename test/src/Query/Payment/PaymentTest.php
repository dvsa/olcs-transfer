<?php

namespace Dvsa\OlcsTest\Transfer\Query\Payment;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Query\Payment\Payment;

/**
 * Payment Test
 */
class PaymentTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $query = Payment::create(['id' => 111, 'foo' => 'bar']);

        $this->assertEquals(111, $query->getId());
    }
}
