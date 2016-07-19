<?php

namespace Dvsa\OlcsTest\Transfer\Query\Variation;

use Dvsa\Olcs\Transfer\Query\PagedTrait;
use Mockery\Adapter\Phpunit\MockeryTestCase;

/**
 * @covers Dvsa\Olcs\Transfer\Query\PagedTrait
 */
class PagedTraitTest extends MockeryTestCase
{
    public function testGetSet()
    {
        $sut = new DummyPagedTrait();

        //  check limit
        $actual = $sut->setLimit(1234);
        static::assertInstanceOf(DummyPagedTrait::class, $actual);
        static::assertEquals(1234, $sut->getLimit());

        //  check page
        $actual = $sut->setPage(9999);
        static::assertInstanceOf(DummyPagedTrait::class, $actual);
        static::assertEquals(9999, $sut->getPage());
    }
}

/**
 * Dummy class for testing PagedTrait
 */
class DummyPagedTrait
{
    use PagedTrait;
}
