<?php

namespace Dvsa\OlcsTest\Transfer\Command\System;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Command\System\CreateFinancialStandingRate as Sut;

/**
 * Create Financial Standing Rate test
 */
class CreateFinancialStandingRateTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $data = [
            'goodsOrPsv' => 'lcat_gv',
            'licenceType' => 'ltyp_sn',
            'firstVehicleRate' => '1234.56',
            'additionalVehicleRate' => '345.67',
            'effectiveFrom' => '2015-06-18',
        ];

        $command = Sut::create($data);

        $this->assertEquals('lcat_gv', $command->getGoodsOrPsv());
        $this->assertEquals('ltyp_sn', $command->getLicenceType());
        $this->assertEquals('1234.56', $command->getFirstVehicleRate());
        $this->assertEquals('345.67', $command->getAdditionalVehicleRate());
        $this->assertEquals('2015-06-18', $command->getEffectiveFrom());
    }
}
