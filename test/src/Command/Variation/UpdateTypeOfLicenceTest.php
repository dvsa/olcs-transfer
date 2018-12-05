<?php

namespace Dvsa\OlcsTest\Transfer\Command\Variation;

use Dvsa\Olcs\Transfer\Command\Variation\UpdateTypeOfLicence;

/**
 * Update Business Type test
 */
class UpdateTypeOfLicenceTest extends \PHPUnit\Framework\TestCase
{
    public function testStructure()
    {
        $data = [
            'id' => 111,
            'version' => 2,
            'licenceType' => 'ltyp_sn',
            'foo' => 'bar'
        ];

        $command = UpdateTypeOfLicence::create($data);

        $this->assertEquals(111, $command->getId());
        $this->assertEquals(2, $command->getVersion());
        $this->assertEquals('ltyp_sn', $command->getLicenceType());
    }
}
