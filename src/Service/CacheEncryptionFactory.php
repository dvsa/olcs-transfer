<?php

namespace Dvsa\Olcs\Transfer\Service;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Cache\Storage\Adapter\Redis;
use Zend\Crypt\BlockCipher;

class CacheEncryptionFactory implements FactoryInterface
{
    const MISSING_CONFIG = 'Config is missing for cache encryption';

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return CacheEncryption|mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $this($serviceLocator, CacheEncryption::class);
    }

    /**
     * Invoke
     *
     * @param ContainerInterface $container
     * @param string             $requestedName
     * @param array|null         $options
     *
     * @throws \Exception
     * @return CacheEncryption
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('Config');

        if (!isset($config['cache-encryption'])) {
            throw new \Exception(self::MISSING_CONFIG);
        }

        /** @var BlockCipher $blockCipher */
        $blockCipher = BlockCipher::factory(
            $config['cache-encryption']['adapter'],
            $config['cache-encryption']['options']
        );

        return new CacheEncryption(
            $container->get(Redis::class),
            $blockCipher,
            $config['cache-encryption']['secrets']['node'],
            $config['cache-encryption']['secrets']['shared'],
            $config['cache-encryption']['node_suffix']
        );
    }
}
