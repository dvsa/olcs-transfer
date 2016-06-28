<?php

namespace Dvsa\OlcsTest\Transfer\Command;

use Dvsa\Olcs\Transfer\Command\AbstractSaveBusinessDetails;

/**
 * @covers Dvsa\Olcs\Transfer\Command\AbstractSaveBusinessDetails
 * @covers Dvsa\Olcs\Transfer\Command\Licence\UpdateBusinessDetails
 * @covers Dvsa\Olcs\Transfer\Command\Application\UpdateBusinessDetails
 */
class AbstractSaveBusinessDetailsTest extends \PHPUnit_Framework_TestCase
{
    public function testGetSet()
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
            'allowEmail' => 'unit_AllowEmail',
        ];

        $command = TestClass::create($data);

        static::assertEquals(111, $command->getId());
        static::assertEquals(2, $command->getVersion());
        static::assertEquals('myname', $command->getName());
        static::assertEquals('mynob', $command->getNatureOfBusiness());
        static::assertEquals('mynumber', $command->getCompanyOrLlpNo());
        static::assertEquals('myaddress', $command->getRegisteredAddress());
        static::assertEquals(['mytradingnames'], $command->getTradingNames());
        static::assertEquals(false, $command->getPartial());
        static::assertEquals('unit_AllowEmail', $command->getAllowEmail());
    }
}

/**
 * Class for testing Abstract Class
 */
class TestClass extends AbstractSaveBusinessDetails
{
}
