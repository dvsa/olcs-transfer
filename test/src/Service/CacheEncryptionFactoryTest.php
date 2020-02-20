<?php

namespace Dvsa\OlcsTest\Transfer\Service;

use Dvsa\Olcs\Transfer\Service\CacheEncryption;
use Dvsa\Olcs\Transfer\Service\CacheEncryptionFactory;
use Mockery as m;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use Zend\Cache\Storage\Adapter\Redis;
use Zend\Cache\Storage\StorageInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * CacheEncryptionFactoryTest
 *
 * @author Ian Lindsay <ian@hemera-business-services.co.uk>
 */
class CacheEncryptionFactoryTest extends MockeryTestCase
{
    public function testCreateServiceNoConfig()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage(CacheEncryptionFactory::MISSING_CONFIG);
        $mockSl = m::mock(ServiceLocatorInterface::class);
        $mockSl->shouldReceive('get')->with('Config')->andReturn([]);

        $sut = new CacheEncryptionFactory();
        $sut->createService($mockSl);
    }

    public function testCreateService()
    {
        $config = [
            'cache-encryption' => [
                'node_suffix' => 'ssweb',
                'adapter' => 'openssl',
                'options' => [
                    'algo' => 'aes',
                    'mode' => 'gcm',
                ],
                'secrets' => [
                    'node' => 'nonprod/redis-ss',
                    'shared' => 'nonprod/redis-shared',
                ],
            ],
        ];

        $cache = m::mock(StorageInterface::class);

        $mockSl = m::mock(ServiceLocatorInterface::class);
        $mockSl->shouldReceive('get')->with('Config')->andReturn($config);
        $mockSl->shouldReceive('get')->with(Redis::class)->andReturn($cache);

        $sut = new CacheEncryptionFactory();
        $service = $sut->createService($mockSl);

        self::assertInstanceOf(CacheEncryption::class, $service);
        self::assertEquals('ssweb', $service->getNodeSuffix());
        self::assertEquals('nonprod/redis-ss', $service->getNodeKey());
        self::assertEquals('nonprod/redis-shared', $service->getSharedKey());
    }
}
