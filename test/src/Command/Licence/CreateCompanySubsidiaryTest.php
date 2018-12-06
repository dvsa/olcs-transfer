<?php


namespace Dvsa\OlcsTest\Transfer\Command\Licence;

use Dvsa\Olcs\Transfer\Command\Licence\CreateCompanySubsidiary;
use PHPUnit_Framework_TestCase;

/**
 * @covers Dvsa\Olcs\Transfer\Command\Licence\CreateCompanySubsidiary
 */
class CreateCompanySubsidiaryTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $command = CreateCompanySubsidiary::create(
            [
                'licence' => 7777,
            ]
        );

        static::assertEquals(7777, $command->getLicence());
    }
}
