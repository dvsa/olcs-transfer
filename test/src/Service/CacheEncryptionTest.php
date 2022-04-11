<?php

declare(strict_types=1);

namespace Dvsa\OlcsTest\Transfer\Service;

use Dvsa\Olcs\Transfer\Query\QueryContainerInterface;
use Dvsa\Olcs\Transfer\Service\CacheEncryption;
use Mockery as m;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use Laminas\Cache\Storage\Adapter\AdapterOptions;
use Laminas\Cache\Storage\StorageInterface;
use Laminas\Crypt\BlockCipher;

class CacheEncryptionTest extends MockeryTestCase
{
    private $nodeKey = 'nodeKey';
    private $sharedKey = 'sharedKey';
    private $nodeSuffix = 'nodeSuffix';
    private $cacheIdentifier = 'cacheIdentifier';
    private $encryptedValue = 'encryptedValue';

    /**
     * Test cache retrieval
     *
     * @dataProvider dpGetSetItemProvider
     */
    public function testGetItem($encryptionMode, $encryptionKey, $nodeSuffix): void
    {
        $unserialisedValue = new \stdClass();
        $decryptedValue = igbinary_serialize($unserialisedValue);
        $cacheKey = $this->cacheIdentifier . $nodeSuffix;

        $cache = m::mock(StorageInterface::class);
        $cache->expects('getItem')->with($cacheKey)->andReturn($this->encryptedValue);

        $encryptor = m::mock(BlockCipher::class);
        $encryptor->expects('setKey')->with($encryptionKey);
        $encryptor->expects('decrypt')->with($this->encryptedValue)->andReturn($decryptedValue);

        $sut = new CacheEncryption($cache, $encryptor, $this->nodeKey, $this->sharedKey, $this->nodeSuffix);

        self::assertEquals($unserialisedValue, $sut->getItem($this->cacheIdentifier, $encryptionMode));
    }

    /**
     * Test getting a custom item (use translations as sample for config purposes)
     */
    public function testGetCustomItem(): void
    {
        $unserialisedValue = new \stdClass();
        $serialisedValue = igbinary_serialize($unserialisedValue);
        $identifier = CacheEncryption::TRANSLATION_KEY_IDENTIFIER;
        $uniqueId = 'uniqueid';
        $cacheKey = $identifier . $uniqueId . CacheEncryption::ENCRYPTION_PUBLIC_NODE_SUFFIX;

        $cache = m::mock(StorageInterface::class);
        $cache->expects('getItem')->with($cacheKey)->andReturn($serialisedValue);

        $encryptor = m::mock(BlockCipher::class);

        $sut = new CacheEncryption($cache, $encryptor, $this->nodeKey, $this->sharedKey, $this->nodeSuffix);

        self::assertEquals($unserialisedValue, $sut->getCustomItem($identifier, $uniqueId));
    }

    public function testGetItemWhenItemNotFound(): void
    {
        $cacheKey = $this->cacheIdentifier . $this->nodeSuffix;

        $cache = m::mock(StorageInterface::class);
        $cache->expects('getItem')->with($cacheKey)->andReturnNull();

        $encryptor = m::mock(BlockCipher::class);
        $encryptor->shouldNotReceive('setKey');
        $encryptor->shouldNotReceive('decrypt');

        $sut = new CacheEncryption($cache, $encryptor, $this->nodeKey, $this->sharedKey, $this->nodeSuffix);

        self::assertNull($sut->getItem($this->cacheIdentifier, CacheEncryption::ENCRYPTION_MODE_NODE));
    }

    /**
     * Test setting a cache item
     *
     * @dataProvider dpGetSetItemProvider
     */
    public function testSetItem($encryptionMode, $encryptionKey, $nodeSuffix): void
    {
        $valueToBeEncrypted = new \stdClass();
        $serializedValue = igbinary_serialize($valueToBeEncrypted);
        $cacheKey = $this->cacheIdentifier . $nodeSuffix;
        $ttl = 300;

        $cache = m::mock(StorageInterface::class);
        $cache->expects('getOptions->setTtl')->with($ttl)->andReturn(m::mock(AdapterOptions::class));
        $cache->expects('setItem')->with($cacheKey, $this->encryptedValue)->andReturnTrue();

        $encryptor = m::mock(BlockCipher::class);
        $encryptor->expects('setKey')->with($encryptionKey);
        $encryptor->expects('encrypt')->with($serializedValue)->andReturn($this->encryptedValue);

        $sut = new CacheEncryption($cache, $encryptor, $this->nodeKey, $this->sharedKey, $this->nodeSuffix);

        self::assertTrue($sut->setItem($this->cacheIdentifier, $encryptionMode, $valueToBeEncrypted, $ttl));
    }

    public function dpGetSetItemProvider(): array
    {
        return [
            [CacheEncryption::ENCRYPTION_MODE_NODE, $this->nodeKey, $this->nodeSuffix],
            [CacheEncryption::ENCRYPTION_MODE_SHARED, $this->sharedKey, CacheEncryption::ENCRYPTION_SHARED_NODE_SUFFIX],
        ];
    }

    /**
     * Test setting an unencrypted item to the cache
     */
    public function testSetItemPublic(): void
    {
        $valueToBeEncrypted = new \stdClass();
        $serializedValue = igbinary_serialize($valueToBeEncrypted);
        $cacheKey = $this->cacheIdentifier . CacheEncryption::ENCRYPTION_PUBLIC_NODE_SUFFIX;
        $ttl = 300;

        $cache = m::mock(StorageInterface::class);
        $cache->expects('getOptions->setTtl')->with($ttl)->andReturn(m::mock(AdapterOptions::class));
        $cache->expects('setItem')->with($cacheKey, $serializedValue)->andReturnTrue();

        $encryptor = m::mock(BlockCipher::class);

        $sut = new CacheEncryption($cache, $encryptor, $this->nodeKey, $this->sharedKey, $this->nodeSuffix);
        self::assertTrue($sut->setItem($this->cacheIdentifier, CacheEncryption::ENCRYPTION_MODE_PUBLIC, $valueToBeEncrypted, $ttl));
    }

    /**
     * Test setting a custom item (use translations as sample for config purposes)
     */
    public function testSetCustomItem(): void
    {
        $valueToBeEncrypted = new \stdClass();
        $serializedValue = igbinary_serialize($valueToBeEncrypted);
        $identifier = CacheEncryption::TRANSLATION_KEY_IDENTIFIER;
        $config = CacheEncryption::CUSTOM_CACHE_TYPE[CacheEncryption::TRANSLATION_KEY_IDENTIFIER];
        $encryptor = m::mock(BlockCipher::class);
        $uniqueId = 'uniqueid';
        $cacheKey = $identifier . $uniqueId . CacheEncryption::ENCRYPTION_PUBLIC_NODE_SUFFIX;

        $cache = m::mock(StorageInterface::class);
        $cache->expects('getOptions->setTtl')->with($config['ttl'])->andReturn(m::mock(AdapterOptions::class));
        $cache->expects('setItem')->with($cacheKey, $serializedValue)->andReturnTrue();

        $sut = new CacheEncryption($cache, $encryptor, $this->nodeKey, $this->sharedKey, $this->nodeSuffix);
        self::assertTrue($sut->setCustomItem($identifier, $valueToBeEncrypted, $uniqueId));
    }

    public function testRemoveCustomItem(): void
    {
        $identifier = CacheEncryption::TRANSLATION_KEY_IDENTIFIER;
        $encryptor = m::mock(BlockCipher::class);
        $uniqueId = 'uniqueid';
        $cacheKey = $identifier . $uniqueId . CacheEncryption::ENCRYPTION_PUBLIC_NODE_SUFFIX;

        $cache = m::mock(StorageInterface::class);
        $cache->expects('removeItem')->with($cacheKey)->andReturnTrue();

        $sut = new CacheEncryption($cache, $encryptor, $this->nodeKey, $this->sharedKey, $this->nodeSuffix);
        self::assertTrue($sut->removeCustomItem($identifier, $uniqueId));
    }

    public function testRemoveCustomItems(): void
    {
        $identifier = CacheEncryption::TRANSLATION_KEY_IDENTIFIER;
        $uniqueIds = ['uniqueId1', 'uniqueId2', 'uniqueId3'];

        $cacheKeysRemoved = [
            'uniqueId1' => $identifier . 'uniqueId1' . CacheEncryption::ENCRYPTION_PUBLIC_NODE_SUFFIX,
            'uniqueId2' => $identifier . 'uniqueId2' . CacheEncryption::ENCRYPTION_PUBLIC_NODE_SUFFIX,
            'uniqueId3' => $identifier . 'uniqueId3' . CacheEncryption::ENCRYPTION_PUBLIC_NODE_SUFFIX,
        ];

        $encryptor = m::mock(BlockCipher::class);
        $cache = m::mock(StorageInterface::class);
        $cache->expects('removeItems')->with($cacheKeysRemoved)->andReturn([]);

        $sut = new CacheEncryption($cache, $encryptor, $this->nodeKey, $this->sharedKey, $this->nodeSuffix);
        $sut->removeCustomItems($identifier, $uniqueIds);
    }

    public function testRemoveCustomItemsMissingIds(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage(CacheEncryption::ERR_NO_IDS_TO_DELETE);
        $cache = m::mock(StorageInterface::class);
        $encryptor = m::mock(BlockCipher::class);
        $sut = new CacheEncryption($cache, $encryptor, $this->nodeKey, $this->sharedKey, $this->nodeSuffix);
        $sut->removeCustomItems('cache key', []);
    }

    /**
     * @dataProvider dpHasItemProvider
     */
    public function testHasItem($hasItem, $encryptionMode, $nodeSuffix): void
    {
        $cacheKey = $this->cacheIdentifier . $nodeSuffix;
        $cache = m::mock(StorageInterface::class);
        $cache->expects('hasItem')->with($cacheKey)->andReturn($hasItem);

        $encryptor = m::mock(BlockCipher::class);

        $sut = new CacheEncryption($cache, $encryptor, $this->nodeKey, $this->sharedKey, $this->nodeSuffix);

        self::assertEquals($sut->hasItem($this->cacheIdentifier, $encryptionMode), $hasItem);
    }

    public function dpHasItemProvider(): array
    {
        return [
            [true, CacheEncryption::ENCRYPTION_MODE_NODE, $this->nodeSuffix],
            [false, CacheEncryption::ENCRYPTION_MODE_NODE, $this->nodeSuffix],
            [true, CacheEncryption::ENCRYPTION_MODE_SHARED, CacheEncryption::ENCRYPTION_SHARED_NODE_SUFFIX],
            [false, CacheEncryption::ENCRYPTION_MODE_SHARED, CacheEncryption::ENCRYPTION_SHARED_NODE_SUFFIX],
            [true, CacheEncryption::ENCRYPTION_MODE_PUBLIC, CacheEncryption::ENCRYPTION_PUBLIC_NODE_SUFFIX],
            [false, CacheEncryption::ENCRYPTION_MODE_PUBLIC, CacheEncryption::ENCRYPTION_PUBLIC_NODE_SUFFIX],
        ];
    }

    /**
     * Test has custom item (use translations as sample for config purposes)
     *
     * @dataProvider dpTrueFalseProvider
     */
    public function testHasCustomItem($hasItem): void
    {
        $identifier = CacheEncryption::TRANSLATION_KEY_IDENTIFIER;
        $encryptor = m::mock(BlockCipher::class);
        $uniqueId = 'uniqueid';
        $cacheIdentifier = $identifier . $uniqueId . CacheEncryption::ENCRYPTION_PUBLIC_NODE_SUFFIX;

        $cache = m::mock(StorageInterface::class);
        $cache->expects('hasItem')->with($cacheIdentifier)->andReturn($hasItem);

        $sut = new CacheEncryption($cache, $encryptor, $this->nodeKey, $this->sharedKey, $this->nodeSuffix);
        self::assertEquals($sut->hasCustomItem($identifier, $uniqueId), $hasItem);
    }

    public function dpTrueFalseProvider(): array
    {
        return [
            [true],
            [false]
        ];
    }

    public function testMissingCustomConfig(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('missing config for cache type missing_cache_type');

        $cache = m::mock(StorageInterface::class);
        $encryptor = m::mock(BlockCipher::class);

        $sut = new CacheEncryption($cache, $encryptor, $this->nodeKey, $this->sharedKey, $this->nodeSuffix);
        $sut->hasCustomItem('missing_cache_type', '');
    }

    /**
     * Test that exception is thrown for missing encryption key
     */
    public function testMissingEncryptionKeyException(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage(CacheEncryption::ERR_NO_KEY_AVAILABLE);
        $cache = m::mock(StorageInterface::class);
        $encryptor = m::mock(BlockCipher::class);

        $sut = new CacheEncryption($cache, $encryptor, $this->nodeKey, $this->sharedKey, $this->nodeSuffix);
        self::assertTrue($sut->setItem($this->cacheIdentifier, 'made up encryption mode', 'value'));
    }

    public function testGetCustomCacheIdentifierForCqrs(): void
    {
        $cache = m::mock(StorageInterface::class);
        $encryptor = m::mock(BlockCipher::class);
        $dto = m::mock(QueryContainerInterface::class);

        $sut = new CacheEncryption($cache, $encryptor, $this->nodeKey, $this->sharedKey, $this->nodeSuffix);
        $map = CacheEncryption::QUERY_MAP;

        foreach ($map as $dtoClass => $cacheIdentifier) {
            $dto->expects('getDtoClassName')->andReturn($dtoClass);
            self::assertEquals($cacheIdentifier, $sut->getCustomCacheIdentifierForCqrs($dto));
        }

        $dto->expects('getDtoClassName')->andReturn('dto');

        $sut = new CacheEncryption($cache, $encryptor, $this->nodeKey, $this->sharedKey, $this->nodeSuffix);
        self::assertNull($sut->getCustomCacheIdentifierForCqrs($dto));
    }

    public function testGetCustomCacheIdentifierForCqrsWhenNull(): void
    {
        $cache = m::mock(StorageInterface::class);
        $encryptor = m::mock(BlockCipher::class);
        $dto = m::mock(QueryContainerInterface::class);
        $dto->expects('getDtoClassName')->andReturn('dto');

        $sut = new CacheEncryption($cache, $encryptor, $this->nodeKey, $this->sharedKey, $this->nodeSuffix);
        self::assertNull($sut->getCustomCacheIdentifierForCqrs($dto));
    }

    public function testGetQueryFromCustomIdentifier(): void
    {
        $cache = m::mock(StorageInterface::class);
        $encryptor = m::mock(BlockCipher::class);

        $sut = new CacheEncryption($cache, $encryptor, $this->nodeKey, $this->sharedKey, $this->nodeSuffix);
        $map = CacheEncryption::QUERY_MAP;

        foreach ($map as $dtoClass => $cacheIdentifier) {
            self::assertEquals($dtoClass, $sut->getQueryFromCustomIdentifier($cacheIdentifier));
        }
    }

    public function testGetQueryFromCustomIdentifierWhenNull(): void
    {
        $cache = m::mock(StorageInterface::class);
        $encryptor = m::mock(BlockCipher::class);

        $sut = new CacheEncryption($cache, $encryptor, $this->nodeKey, $this->sharedKey, $this->nodeSuffix);
        self::assertNull($sut->getQueryFromCustomIdentifier('missing identifier'));
    }
}
