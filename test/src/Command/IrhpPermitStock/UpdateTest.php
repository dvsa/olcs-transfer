<?php

namespace Dvsa\OlcsTest\Transfer\Command\IrhpPermitStock;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Command\IrhpPermitStock\Update;

/**
 * Update test
 */
class UpdateTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {

        $data = [
            'id' => '2',
            'validFrom' => '2029-01-01',
            'validTo' => '2029-12-31',
            'initialStock' => '1400',
            'permitType' => '1'
        ];

        $command = Update::create($data);

        $this->assertEquals($data['id'], $command->getId());
        $this->assertEquals($data['validFrom'], $command->getValidFrom());
        $this->assertEquals($data['validTo'], $command->getValidTo());
        $this->assertEquals($data['permitType'], $command->getPermitType());
        $this->assertEquals($data['initialStock'], $command->getInitialStock());
    }
}
