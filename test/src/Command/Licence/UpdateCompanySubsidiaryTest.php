<?php

namespace Dvsa\OlcsTest\Transfer\Command\Licence;

use Dvsa\Olcs\Transfer\Command\Licence\UpdateCompanySubsidiary;
use PHPUnit_Framework_TestCase;

/**
 * @covers Dvsa\Olcs\Transfer\Command\Licence\UpdateCompanySubsidiary
 */
class UpdateCompanySubsidiaryTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $command = UpdateCompanySubsidiary::create(
            [
                'licence' => 7777,
            ]
        );

        static::assertEquals(7777, $command->getLicence());
    }
}
