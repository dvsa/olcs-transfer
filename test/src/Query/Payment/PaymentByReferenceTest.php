<?php

namespace Dvsa\OlcsTest\Transfer\Query\Payment;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Query\Payment\PaymentByReference;

/**
 * Payment by reference Test
 */
class PaymentByReferenceTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $query = PaymentByReference::create(['reference' => 'OLCS-1234-ABCD', 'foo' => 'bar']);

        $this->assertEquals('OLCS-1234-ABCD', $query->getReference());
    }
}
