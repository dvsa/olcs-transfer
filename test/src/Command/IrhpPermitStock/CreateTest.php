<?php

namespace Dvsa\OlcsTest\Transfer\Command\IrhpPermitStock;

use Dvsa\Olcs\Transfer\Command\IrhpPermitStock\Create;

/**
 * Create test
 */
class CreateTest extends \PHPUnit\Framework\TestCase
{
    public function testStructure()
    {
        $data = [
            'irhpPermitType' => '1',
            'validFrom' => '2029-01-01',
            'validTo' => '2029-12-31',
            'initialStock' => 1400
        ];

        $command = Create::create($data);

        $this->assertEquals($data['validFrom'], $command->getValidFrom());
        $this->assertEquals($data['validTo'], $command->getValidTo());
        $this->assertEquals($data['irhpPermitType'], $command->getIrhpPermitType());
        $this->assertEquals($data['initialStock'], $command->getInitialStock());
    }
}
