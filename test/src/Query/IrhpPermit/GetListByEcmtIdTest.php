<?php

namespace Dvsa\OlcsTest\Transfer\Query\IrhpPermit;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Query\IrhpPermit\GetListByEcmtId;

/**
 * @covers \Dvsa\Olcs\Transfer\Query\IrhpPermit\GetListByEcmtId
 */


class GetListByEcmtIdTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $sut = GetListByEcmtId::create(
            [
              'ecmtPermitApplication' => 2,
              'page' => 1,
              'limit' => 10,
              'sort' => 'id',
              'order' => 'ASC',
            ]
        );
        static::assertEquals(
            [
            'ecmtPermitApplication' => 2,
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
