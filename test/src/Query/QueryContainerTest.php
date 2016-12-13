<?php

namespace Dvsa\OlcsTest\Transfer\Query\Variation;

use Dvsa\Olcs\Transfer\Query\CachableMediumTermQueryInterface;
use Dvsa\Olcs\Transfer\Query\CachableShortTermQueryInterface;
use Dvsa\Olcs\Transfer\Query\QueryContainer;
use Dvsa\Olcs\Transfer\Query\QueryInterface;
use Dvsa\Olcs\Transfer\Query\StreamInterface;
use Mockery as m;
use Mockery\Adapter\Phpunit\MockeryTestCase;

/**
 * @covers \Dvsa\Olcs\Transfer\Query\QueryContainer
 */
class QueryContainerTest extends MockeryTestCase
{
    /** @var QueryContainer */
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

        $expected = md5(get_class($mockDto) . '-' . json_encode(['foo' => 'bar']));

        $this->assertSame($expected, $this->sut->getCacheIdentifier());
    }

    /**
     * @dataProvider dpTestIsX
     */
    public function testIsX($dto, $expect)
    {
        $this->sut = new QueryContainer();
        $this->sut->setDto($dto);

        static::assertEquals($expect['isShortCache'], $this->sut->isShortTermCachable());
        static::assertEquals($expect['isMediumCache'], $this->sut->isMediumTermCachable());
        static::assertEquals($expect['isStream'], $this->sut->isStream());
    }

    public function dpTestIsX()
    {
        return [
            [
                'dto' => m::mock(
                    implode(
                        ',',
                        [
                            QueryInterface::class,
                            CachableShortTermQueryInterface::class,
                            CachableMediumTermQueryInterface::class,
                            StreamInterface::class,
                        ]
                    )
                ),
                'expect' => [
                    'isShortCache' => true,
                    'isMediumCache' => true,
                    'isStream' => true,
                ],
            ],
            [
                'dto' => m::mock(QueryInterface::class . ',' . StreamInterface::class),
                'expect' => [
                    'isShortCache' => false,
                    'isMediumCache' => false,
                    'isStream' => true,
                ],
            ],
            [
                'dto' => m::mock(QueryInterface::class . ',' . CachableShortTermQueryInterface::class),
                'expect' => [
                    'isShortCache' => true,
                    'isMediumCache' => false,
                    'isStream' => false,
                ],
            ],
        ];
    }
}
