<?php

namespace Dvsa\OlcsTest\Transfer\Command\Payment;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Command\Payment\PayOutstandingFees;

/**
 * Pay Outstanding Fees test
 */
class PayOutstandingFeesTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $data = [
            'feeIds' => [1, 2],
            'organisationId' => 69,
            'cpmsRedirectUrl' => 'http://olcs-selfserve/foo',
            'paymentMethod' => 'fpm_card_online',
        ];

        $command = PayOutstandingFees::create($data);

        $this->assertEquals([1, 2], $command->getFeeIds());
        $this->assertEquals(69, $command->getOrganisationId());
        $this->assertEquals('http://olcs-selfserve/foo', $command->getCpmsRedirectUrl());
        $this->assertEquals('fpm_card_online', $command->getPaymentMethod());
    }
}
