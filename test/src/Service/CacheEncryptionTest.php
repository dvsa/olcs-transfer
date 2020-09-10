<?php

namespace Dvsa\OlcsTest\Transfer\Service;

use Aws\Result as AwsResult;
use Aws\SecretsManager\SecretsManagerClient;
use Dvsa\Olcs\Transfer\Service\CacheEncryption;
use Mockery as m;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use Zend\Cache\Storage\Adapter\AdapterOptions;
use Zend\Cache\Storage\StorageInterface;
use Zend\Crypt\BlockCipher;

/**
 * CacheEncryptionTest
 *
 * @author Ian Lindsay <ian@hemera-business-services.co.uk>
 */
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
    public function testGetItem($encryptionMode, $encryptionKey, $nodeSuffix)
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
     * Test setting a cache item
     *
     * @dataProvider dpGetSetItemProvider
     */
    public function testSetItem($encryptionMode, $encryptionKey, $nodeSuffix)
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

    public function dpGetSetItemProvider()
    {
        return [
            [CacheEncryption::ENCRYPTION_MODE_NODE, $this->nodeKey, $this->nodeSuffix],
            [CacheEncryption::ENCRYPTION_MODE_SHARED, $this->sharedKey, CacheEncryption::ENCRYPTION_SHARED_NODE_SUFFIX],
        ];
    }

    /**
     * Test setting an unencrypted item to the cache
     */
    public function testSetItemPublic()
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
     * @dataProvider dpHasItemProvider
     */
    public function testHasItem($hasItem, $encryptionMode, $nodeSuffix)
    {
        $cacheKey = $this->cacheIdentifier . $nodeSuffix;
        $cache = m::mock(StorageInterface::class);
        $cache->expects('hasItem')->with($cacheKey)->andReturn($hasItem);

        $encryptor = m::mock(BlockCipher::class);

        $sut = new CacheEncryption($cache, $encryptor, $this->nodeKey, $this->sharedKey, $this->nodeSuffix);

        self::assertEquals($sut->hasItem($this->cacheIdentifier, $encryptionMode), $hasItem);
    }

    public function dpHasItemProvider()
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
     * Test that exception is thrown for missing encryption key
     */
    public function testMissingEncryptionKeyException()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage(CacheEncryption::ERR_NO_KEY_AVAILABLE);
        $cache = m::mock(StorageInterface::class);
        $encryptor = m::mock(BlockCipher::class);

        $sut = new CacheEncryption($cache, $encryptor, $this->nodeKey, $this->sharedKey, $this->nodeSuffix);
        self::assertTrue($sut->setItem($this->cacheIdentifier, 'made up encryption mode', 'value'));
    }
}
