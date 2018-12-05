<?php

namespace Dvsa\OlcsTest\Transfer\Command;

use Dvsa\Olcs\Transfer\Command\Lva\AbstractDeleteCompanySubsidiary;

/**
 * @covers Dvsa\Olcs\Transfer\Command\Lva\AbstractDeleteCompanySubsidiary
 */
class AbstractDeleteCompanySubsidiaryTest extends \PHPUnit\Framework\TestCase
{
    public function testGetSet()
    {
        $command = TestAbstractDeleteCompanySubsidiary::create(
            [
                'ids' => [111, 222, 333],
            ]
        );

        static::assertEquals([111, 222, 333], $command->getIds());
    }
}

/**
 * Class for testing Abstract Class
 */
class TestAbstractDeleteCompanySubsidiary extends AbstractDeleteCompanySubsidiary
{
}
