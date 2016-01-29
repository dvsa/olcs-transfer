<?php

namespace Dvsa\OlcsTest\Transfer\Command\Licence;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Command\Licence\UpdateTypeOfLicence;

/**
 * Update Business Type test
 */
class UpdateTypeOfLicenceTest extends PHPUnit_Framework_TestCase
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
