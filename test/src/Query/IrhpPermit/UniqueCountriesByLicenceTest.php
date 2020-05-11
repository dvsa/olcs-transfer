<?php

namespace Dvsa\OlcsTest\Transfer\Query\IrhpPermit;

use Dvsa\Olcs\Transfer\Query\IrhpPermit\UniqueCountriesByLicence;

/**
 * @covers \Dvsa\Olcs\Transfer\Query\IrhpPermit\UniqueCountriesByLicence
 */
class UniqueCountriesByLicenceTest extends \PHPUnit\Framework\TestCase
{
    public function testStructure()
    {
        $sut = UniqueCountriesByLicence::create(
            [
                'licence' => 7,
                'irhpPermitType' => 2,
            ]
        );
        static::assertEquals(
            [
                'licence' => 7,
                'irhpPermitType' => 2,
            ],
            $sut->getArrayCopy()
        );
    }
}
