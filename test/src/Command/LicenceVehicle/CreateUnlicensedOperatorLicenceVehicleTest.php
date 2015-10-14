<?php

namespace Dvsa\OlcsTest\Transfer\Command\LicenceVehicle;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Command\LicenceVehicle\CreateUnlicensedOperatorLicenceVehicle;

/**
 * CreateUnlicensedOperatorLicenceVehicle test
 */
class CreateUnlicensedOperatorLicenceVehicleTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $data = [
            'organisation' => 69,
            'vrm' => 'ABC123',
            'platedWeight' => 895,
        ];

        $command = CreateUnlicensedOperatorLicenceVehicle::create($data);

        $this->assertEquals(69, $command->getOrganisation());
        $this->assertEquals('ABC123', $command->getVrm());
        $this->assertEquals(895, $command->getPlatedWeight());
    }
}
