<?php

namespace Dvsa\OlcsTest\Transfer\Query\Cpms;

use Dvsa\Olcs\Transfer\Query\Cpms\StoredCardList;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use Mockery as m;

/**
 * @covers \Dvsa\Olcs\Transfer\Query\Cpms\StoredCardList
 */
class StoredCardListTest extends MockeryTestCase
{
    public function testGetSet()
    {
        $sut = StoredCardList::create(
            [
                'isNi' => 'Y',
            ]
        );

        static::assertEquals('Y', $sut->getIsNi());
    }
}
