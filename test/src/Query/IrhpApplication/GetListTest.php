<?php

namespace Dvsa\OlcsTest\Transfer\Query\IrhpApplication;

use Dvsa\Olcs\Transfer\Query\IrhpApplication\GetList;

/**
 * @covers \Dvsa\Olcs\Transfer\Query\IrhpApplication\GetList
 */

class GetListTest extends \PHPUnit\Framework\TestCase
{
    public function testStructure()
    {
        $sut = GetList::create(['order' => 'DESC']);

        static::assertEquals([
            'status' => null,
            'sort' => 'id',
            'order' => 'DESC',
            'sortWhitelist' => array()
        ], $sut->getArrayCopy());
    }
}
