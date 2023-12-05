<?php

namespace Dvsa\OlcsTest\Transfer\Command;

use Dvsa\Olcs\Transfer\Command\Lva\AbstractUpdateCompanySubsidiary;

/**
 * @covers Dvsa\Olcs\Transfer\Command\Lva\AbstractCreateCompanySubsidiary
 * @covers Dvsa\Olcs\Transfer\Command\Lva\AbstractUpdateCompanySubsidiary
 */
class AbstractUpdateCompanySubsidiaryTest extends \PHPUnit\Framework\TestCase
{
    public function testGetSet()
    {
        $command = TestAbstractUpdateCompanySubsidiary::create(
            [
                'id' => 111,
                'version' => 2,
                'name' => 'unit_name',
                'companyNo' => 'unit_CompNo',
            ]
        );

        static::assertEquals(111, $command->getId());
        static::assertEquals(2, $command->getVersion());
        static::assertEquals('unit_name', $command->getName());
        static::assertEquals('unit_CompNo', $command->getCompanyNo());
    }
}

/**
 * Class for testing Abstract Class
 */
class TestAbstractUpdateCompanySubsidiary extends AbstractUpdateCompanySubsidiary
{
}
