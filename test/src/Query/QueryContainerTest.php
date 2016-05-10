<?php

namespace Dvsa\OlcsTest\Transfer\Query\Variation;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Query\QueryContainer;
use Mockery as m;
use Dvsa\Olcs\Transfer\Query\QueryInterface;
use Dvsa\Olcs\Transfer\Query\CachableMediumTermQueryInterface;
use Dvsa\Olcs\Transfer\Query\CachableShortTermQueryInterface;

/**
 * QueryContainerTest
 */
class QueryContainerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var QueryContainer
     */
    private $sut;

    public function setUp()
    {
        $this->sut = new QueryContainer();
    }

    public function testGetCacheIdentifier()
    {
        $mockDto = m::mock(QueryInterface::class);
        $mockDto->shouldReceive('getArrayCopy')->with()->once()->andReturn(['foo' => 'bar']);
        $this->sut->setDto($mockDto);

        $expected = md5(get_class($mockDto) .'-'. json_encode(['foo' => 'bar']));

        $this->assertSame($expected, $this->sut->getCacheIdentifier());
    }

    public function testIsShortTermCachable()
    {
        $mockDto = m::mock(QueryInterface::class);
        $this->sut->setDto($mockDto);

        $sut = new QueryContainer();
        $sut->setDto($mockDto);

        $this->assertFalse($this->sut->isShortTermCachable());
    }

    public function testIsShortTermCachableTrue()
    {
        $mockDto = m::mock(QueryInterface::class, CachableShortTermQueryInterface::class);
        $this->sut->setDto($mockDto);

        $sut = new QueryContainer();
        $sut->setDto($mockDto);

        $this->assertTrue($this->sut->isShortTermCachable());
    }

    public function testIsMediumTermCachable()
    {
        $mockDto = m::mock(QueryInterface::class);
        $this->sut->setDto($mockDto);

        $sut = new QueryContainer();
        $sut->setDto($mockDto);

        $this->assertFalse($this->sut->isMediumTermCachable());
    }

    public function testIsMediumTermCachableTrue()
    {
        $mockDto = m::mock(QueryInterface::class, CachableMediumTermQueryInterface::class);
        $this->sut->setDto($mockDto);

        $sut = new QueryContainer();
        $sut->setDto($mockDto);

        $this->assertTrue($this->sut->isMediumTermCachable());
    }
}
