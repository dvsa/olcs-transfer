<?php

namespace Dvsa\OlcsTest\Transfer\Query\Permits;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Query\Permits\EcmtConstrainedCountriesList;

/**
 * @covers \Dvsa\Olcs\Transfer\Query\Permits\EcmtConstrainedCountriesList
 */


class EcmtConstrainedCountriesListTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $sut = EcmtConstrainedCountriesList::create(
            [
              'hasEcmtConstraints' => 1
            ]
        );
        static::assertEquals(['hasEcmtConstraints' => 1], $sut->getArrayCopy());
    }
}
