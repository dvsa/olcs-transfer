<?php

namespace Dvsa\OlcsTest\Transfer\Command\Partial;

use Dvsa\Olcs\Transfer\Command\Partial\ApplicationTracking;

/**
 * Application Tracking Partial test
 */
class ApplicationTrackingTest extends \PHPUnit\Framework\TestCase
{
    public function testStructure()
    {
        $data = [
            'id' => 69,
            'version' => 1,
            'addressesStatus' => 2,
            'businessDetailsStatus' => 3,
            'businessTypeStatus' => 4,
            'communityLicencesStatus' => 5,
            'conditionsUndertakingsStatus' => 6,
            'convictionsPenaltiesStatus' => 7,
            'discsStatus' => 8,
            'financialEvidenceStatus' => 9,
            'financialHistoryStatus' => 10,
            'licenceHistoryStatus' => 11,
            'operatingCentresStatus' => 12,
            'peopleStatus' => 13,
            'safetyStatus' => 14,
            'taxiPhvStatus' => 15,
            'transportManagersStatus' => 16,
            'typeOfLicenceStatus' => 17,
            'declarationsInternalStatus' => 18,
            'vehiclesDeclarationsStatus' => 19,
            'vehiclesPsvStatus' => 20,
            'vehiclesStatus' => 21,
        ];

        $command = ApplicationTracking::create($data);

        $this->assertEquals(69, $command->getId());
        $this->assertEquals(1, $command->getVersion());
        $this->assertEquals(2, $command->getAddressesStatus());
        $this->assertEquals(3, $command->getBusinessDetailsStatus());
        $this->assertEquals(4, $command->getBusinessTypeStatus());
        $this->assertEquals(5, $command->getCommunityLicencesStatus());
        $this->assertEquals(6, $command->getConditionsUndertakingsStatus());
        $this->assertEquals(7, $command->getConvictionsPenaltiesStatus());
        $this->assertEquals(8, $command->getDiscsStatus());
        $this->assertEquals(9, $command->getFinancialEvidenceStatus());
        $this->assertEquals(10, $command->getFinancialHistoryStatus());
        $this->assertEquals(11, $command->getLicenceHistoryStatus());
        $this->assertEquals(12, $command->getOperatingCentresStatus());
        $this->assertEquals(13, $command->getPeopleStatus());
        $this->assertEquals(14, $command->getSafetyStatus());
        $this->assertEquals(15, $command->getTaxiPhvStatus());
        $this->assertEquals(16, $command->getTransportManagersStatus());
        $this->assertEquals(17, $command->getTypeOfLicenceStatus());
        $this->assertEquals(18, $command->getDeclarationsInternalStatus());
        $this->assertEquals(19, $command->getVehiclesDeclarationsStatus());
        $this->assertEquals(20, $command->getVehiclesPsvStatus());
        $this->assertEquals(21, $command->getVehiclesStatus());
    }
}
