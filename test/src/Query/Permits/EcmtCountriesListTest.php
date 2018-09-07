<?php

namespace Dvsa\OlcsTest\Transfer\Query\Permits;

use Mockery as m;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use Dvsa\Olcs\Transfer\Query\Permits\EcmtCountriesList;

/**
 * @covers \Dvsa\Olcs\Transfer\Query\Permits\EcmtCountriesList
 */


class EcmtCountriesListTest extends MockeryTestCase
{
    public function testEcmtCountriesList()
    {
        $sut = EcmtCountriesList::create(
            [
              'isEcmtState' => 1
            ]
        );

        static::assertEquals(1, $sut->getIsEcmtState());
    }
}
