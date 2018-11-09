<?php

namespace Dvsa\OlcsTest\Transfer\Query\IrhpPermit;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Query\IrhpPermit\GetList;

/**
 * @covers \Dvsa\Olcs\Transfer\Query\IrhpPermit\GetList
 */


class GetListTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $sut = GetList::create(
            [
              'irhpPermitApplication' => 2,
              'page' => 1,
              'limit' => 10,
              'sort' => 'id',
              'order' => 'ASC',
            ]
        );
        static::assertEquals(
            [
            'irhpPermitApplication' => 2,
            'page' => 1,
            'limit' => 10,
            'sort' => 'id',
            'order' => 'ASC',
            'sortWhitelist' => []
            ],
            $sut->getArrayCopy()
        );
    }
}
