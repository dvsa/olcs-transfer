<?php

namespace Dvsa\OlcsTest\Transfer\Query\PartialMarkup;

use Dvsa\Olcs\Transfer\Query\PartialMarkup\GetList;

/**
 * @covers \Dvsa\Olcs\Transfer\Query\PartialMarkup\GetList
 */
class GetListTest extends \PHPUnit\Framework\TestCase
{
    public function testStructure()
    {
        $sut = GetList::create(
            [
                'translationSearch' => 'search term',
                'page' => 1,
                'limit' => 10,
                'sort' => 'id',
                'order' => 'ASC',
                'category' => 1,
                'subCategory' => 4
            ]
        );
        static::assertEquals(
            [
                'translationSearch' => 'search term',
                'page' => 1,
                'limit' => 10,
                'sort' => 'id',
                'order' => 'ASC',
                'category' => 1,
                'subCategory' => 4,
                'sortWhitelist' => []
            ],
            $sut->getArrayCopy()
        );
    }
}
