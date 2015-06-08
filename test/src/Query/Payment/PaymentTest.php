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
        $query = Payment::create(['reference' => 'OLCS-1234-ABCD', 'foo' => 'bar']);

        $this->assertEquals('OLCS-1234-ABCD', $query->getReference());
    }
}
