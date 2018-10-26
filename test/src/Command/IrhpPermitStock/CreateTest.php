<?php

namespace Dvsa\OlcsTest\Transfer\Command\IrhpPermitStock;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Command\IrhpPermitStock\Create;

/**
 * Create test
 */
class CreateTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $data = [
            'permitType' => '1',
            'validFrom' => '2029-01-01',
            'validTo' => '2029-12-31',
            'initialStock' => 1400
        ];

        $command = Create::create($data);

        $this->assertEquals($data['validFrom'], $command->getValidFrom());
        $this->assertEquals($data['validTo'], $command->getValidTo());
        $this->assertEquals($data['permitType'], $command->getPermitType());
        $this->assertEquals($data['initialStock'], $command->getInitialStock());
    }
}
