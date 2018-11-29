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
            'surrenderId' => '123'
        ];

        $command = ProcessSignatureResponse::create($data);

        $this->assertSame('321', $command->getApplication());
        $this->assertSame('123', $command->getContinuationDetail());
        $this->assertSame('123', $command->getSurrenderId());
    }

    public function testContinuationDetail()
    {
        $command = ProcessSignatureResponse::create([]);

        $this->assertSame(null, $command->getContinuationDetail());
        $command->setContinuationDetail('99');
        $this->assertSame(99, $command->getContinuationDetail());
    }

    public function testSetSurrenderId()
    {
        $command = ProcessSignatureResponse::create([]);

        $this->assertSame(null, $command->getSurrenderId());
        $command->setSurrenderId('99');
        $this->assertSame(99, $command->getSurrenderId());
    }

    public function testSetRole()
    {
        $command = ProcessSignatureResponse::create([]);
        $this->assertSame(null, $command->getRole());
        $command->setRole('tma_sign_as_op');
        $this->assertSame('tma_sign_as_op', $command->getRole());
    }


}
