<?php

namespace Dvsa\OlcsTest\Transfer\Command\Payment;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Command\Payment\CompletePayment;

/**
 * Complete Payment test
 */
class CompletePaymentTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $data = [
            'reference' => 'OLCS-1234-ABCD',
            'paymentMethod' => 'fpm_card_online',
            'cpmsData' => ['foo' => 'bar'],
        ];

        $command = CompletePayment::create($data);

        $this->assertEquals('OLCS-1234-ABCD', $command->getReference());
        $this->assertEquals('fpm_card_online', $command->getPaymentMethod());
        $this->assertEquals(['foo' => 'bar'], $command->getCpmsData());
    }
}
