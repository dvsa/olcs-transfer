<?php

namespace Dvsa\OlcsTest\Transfer\Command\Transaction;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Command\Transaction\AdjustTransaction;

/**
 * Adjust Transaction test
 */
class AdjustTransactionTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $data = [
            'received' => '10.00',
            'payer' => 'Dan',
            'slipNo' => '1234',
            'chequeNo' => '2345',
            'chequeDate' => '2015-12-11',
            'poNo' => '3456',
            'reason' => 'Foo',
        ];

        $command = AdjustTransaction::create($data);

        $this->assertEquals('10.00', $command->getReceived());
        $this->assertEquals('Dan', $command->getPayer());
        $this->assertEquals('1234', $command->getSlipNo());
        $this->assertEquals('2345', $command->getChequeNo());
        $this->assertEquals('2015-12-11', $command->getChequeDate());
        $this->assertEquals('3456', $command->getPoNo());
        $this->assertEquals('Foo', $command->getReason());
    }
}
