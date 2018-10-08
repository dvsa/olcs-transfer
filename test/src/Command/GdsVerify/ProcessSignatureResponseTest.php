<?php

namespace Dvsa\OlcsTest\Transfer\Command\GdsVerify;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Command\GdsVerify\ProcessSignatureResponse;

/**
 * ProcessSignatureResponseTest
 */
class ProcessSignatureResponseTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $data = [
            'application' => '321',
            'continuationDetail' => '123',
        ];

        $command = ProcessSignatureResponse::create($data);

        $this->assertSame('321', $command->getApplication());
        $this->assertSame('123', $command->getContinuationDetail());
    }

    public function testContinuationDetail()
    {
        $command = ProcessSignatureResponse::create([]);

        $this->assertSame(null, $command->getContinuationDetail());
        $command->setContinuationDetail('99');
        $this->assertSame(99, $command->getContinuationDetail());
    }

    public function testTransportManagerApplicationOperatorSignature()
    {
        $command = ProcessSignatureResponse::create([]);
        $this->assertSame(null, $command->getTransportManagerApplicationOperatorSignature());
        $command->setTransportManagerApplicationOperatorSignature('Y');
        $this->assertSame('Y', $command->getTransportManagerApplicationOperatorSignature());
    }
}
