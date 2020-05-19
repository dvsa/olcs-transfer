<?php

namespace Dvsa\OlcsTest\Transfer\Query\Variation;

use Dvsa\Olcs\Transfer\Query\CachableMediumTermQueryInterface;
use Dvsa\Olcs\Transfer\Query\CachableShortTermQueryInterface;
use Dvsa\Olcs\Transfer\Query\PublicQueryCacheInterface;
use Dvsa\Olcs\Transfer\Query\QueryContainer;
use Dvsa\Olcs\Transfer\Query\QueryInterface;
use Dvsa\Olcs\Transfer\Query\SharedEncryptionCacheInterface;
use Dvsa\Olcs\Transfer\Query\StreamInterface;
use Dvsa\Olcs\Transfer\Router\Query;
use Dvsa\Olcs\Transfer\Service\CacheEncryption;
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
     * @dataProvider dpGetCacheEncryptionMode
     */
    public function testGetDtoClassName()
    {
        $dto = m::mock(QueryInterface::class);
        $className = get_class($dto);
        $this->sut->setDto($dto);

        self::assertEquals($className, $this->sut->getDtoClassName());
    }

    /**
     * @dataProvider dpGetCacheEncryptionMode
     */
    public function testGetCacheEncryptionMode($dto, $encryptionMode)
    {
        $sut = new QueryContainer();
        $sut->setDto($dto);

        self::assertEquals($encryptionMode, $sut->getEncryptionMode());
    }

    public function dpGetCacheEncryptionMode()
    {
        return [
            [
                m::mock(QueryInterface::class . ',' . PublicQueryCacheInterface::class),
                CacheEncryption::ENCRYPTION_MODE_PUBLIC
            ],
            [
                m::mock(QueryInterface::class . ',' . SharedEncryptionCacheInterface::class),
                CacheEncryption::ENCRYPTION_MODE_SHARED
            ],
            [
                m::mock(QueryInterface::class),
                CacheEncryption::ENCRYPTION_MODE_NODE
            ],
        ];
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
        static::assertEquals($expect['isPublicCache'], $this->sut->isPublicCachable());
        static::assertEquals($expect['isSharedEncryptionCache'], $this->sut->isSharedEncryptionCachable());
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
                            PublicQueryCacheInterface::class,
                            SharedEncryptionCacheInterface::class,
                            StreamInterface::class,
                        ]
                    )
                ),
                'expect' => [
                    'isShortCache' => true,
                    'isMediumCache' => true,
                    'isPublicCache' => true,
                    'isSharedEncryptionCache' => true,
                    'isStream' => true,
                ],
            ],
            [
                'dto' => m::mock(QueryInterface::class . ',' . StreamInterface::class),
                'expect' => [
                    'isShortCache' => false,
                    'isMediumCache' => false,
                    'isPublicCache' => false,
                    'isSharedEncryptionCache' => false,
                    'isStream' => true,
                ],
            ],
            [
                'dto' => m::mock(QueryInterface::class . ',' . CachableShortTermQueryInterface::class),
                'expect' => [
                    'isShortCache' => true,
                    'isMediumCache' => false,
                    'isPublicCache' => false,
                    'isSharedEncryptionCache' => false,
                    'isStream' => false,
                ],
            ],
            [
                'dto' => m::mock(QueryInterface::class . ',' . CachableMediumTermQueryInterface::class),
                'expect' => [
                    'isShortCache' => false,
                    'isMediumCache' => true,
                    'isPublicCache' => false,
                    'isSharedEncryptionCache' => false,
                    'isStream' => false,
                ],
            ],
            [
                'dto' => m::mock(QueryInterface::class . ',' . SharedEncryptionCacheInterface::class),
                'expect' => [
                    'isShortCache' => false,
                    'isMediumCache' => false,
                    'isPublicCache' => false,
                    'isSharedEncryptionCache' => true,
                    'isStream' => false,
                ],
            ],
            [
                'dto' => m::mock(QueryInterface::class . ',' . PublicQueryCacheInterface::class),
                'expect' => [
                    'isShortCache' => false,
                    'isMediumCache' => false,
                    'isPublicCache' => true,
                    'isSharedEncryptionCache' => false,
                    'isStream' => false,
                ],
            ],
        ];
    }
}
