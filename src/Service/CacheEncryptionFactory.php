<?php

namespace Dvsa\Olcs\Transfer\Service;

use Interop\Container\ContainerInterface;
use Laminas\Cache\Storage\StorageInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Laminas\Crypt\BlockCipher;

class CacheEncryptionFactory implements FactoryInterface
{
    const MISSING_CONFIG = 'Config is missing for cache encryption';

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
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): CacheEncryption
    {
        $config = $container->get('Config');

        if (!isset($config['cache-encryption'])) {
            throw new \Exception(self::MISSING_CONFIG);
        }

        $cache = $container->get('default-cache');
        assert($cache instanceof StorageInterface);

        /** @var BlockCipher $blockCipher */
        $blockCipher = BlockCipher::factory(
            $config['cache-encryption']['adapter'],
            $config['cache-encryption']['options']
        );

        return new CacheEncryption(
            $cache,
            $blockCipher,
            $config['cache-encryption']['secrets']['node'],
            $config['cache-encryption']['secrets']['shared'],
            $config['cache-encryption']['node_suffix']
        );
    }
}
