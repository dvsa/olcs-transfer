<?php

namespace Dvsa\OlcsTest\Transfer\Command\Licence;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Command\Licence\UpdateBusinessDetails;

/**
 * Update Business Details test
 */
class UpdateBusinessDetailsTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $data = [
            'id' => 111,
            'version' => 2,
            'name' => 'myname',
            'natureOfBusiness' => 'mynob',
            'companyOrLlpNo' => 'mynumber',
            'registeredAddress' => 'myaddress',
            'tradingNames' => ['mytradingnames'],
            'partial' => false,
        ];

        $command = UpdateBusinessDetails::create($data);

        $this->assertEquals(111, $command->getId());
        $this->assertEquals(2, $command->getVersion());
        $this->assertEquals('myname', $command->getName());
        $this->assertEquals('mynob', $command->getNatureOfBusiness());
        $this->assertEquals('mynumber', $command->getCompanyOrLlpNo());
        $this->assertEquals('myaddress', $command->getRegisteredAddress());
        $this->assertEquals(['mytradingnames'], $command->getTradingNames());
        $this->assertEquals(false, $command->getPartial());
    }
}
