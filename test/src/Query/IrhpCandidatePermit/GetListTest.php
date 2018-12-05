<?php

namespace Dvsa\OlcsTest\Transfer\Query\IrhpCandidatePermit;

use Dvsa\Olcs\Transfer\Query\IrhpCandidatePermit\GetList;

/**
 * @covers \Dvsa\Olcs\Transfer\Query\IrhpCandidatePermit\GetList
 */


class GetListTest extends \PHPUnit\Framework\TestCase
{
    public function testStructure()
    {
        $sut = GetList::create(
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
