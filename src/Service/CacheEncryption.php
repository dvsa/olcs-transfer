<?php

namespace Dvsa\Olcs\Transfer\Service;

use Zend\Cache\Storage\Adapter\AdapterOptions;
use Zend\Cache\Storage\StorageInterface;
use Zend\Crypt\BlockCipher;

class CacheEncryption
{
    const ERR_NO_KEY_AVAILABLE = 'No encryption key available for this encryption mode';

    const ENCRYPTION_MODE_PUBLIC = 'encryption_public';
    const ENCRYPTION_MODE_SHARED = 'encryption_shared';
    const ENCRYPTION_MODE_NODE = 'encryption_node';

    const ENCRYPTION_PUBLIC_NODE_SUFFIX = 'public';
    const ENCRYPTION_SHARED_NODE_SUFFIX = 'shared';

    /** @var StorageInterface $cache */
    private $cache;

    /** @var BlockCipher $encryptor */
    private $encryptor;

    /** @var string $nodeKey */
    private $nodeKey;

    /** @var string $sharedKey */
    private $sharedKey;

    /** @var string $nodeSuffix */
    private $nodeSuffix;

    /**
     * CacheEncryption constructor.
     *
     * @param StorageInterface $cache
     * @param BlockCipher      $encryptor
     * @param string           $nodeKey
     * @param string           $sharedKey
     * @param string           $nodeSuffix
     *
     * @return void
     */
    public function __construct(
        StorageInterface $cache,
        BlockCipher $encryptor,
        string $nodeKey,
        string $sharedKey,
        string $nodeSuffix
    ) {
        $this->cache = $cache;
        $this->encryptor = $encryptor;
        $this->nodeKey = $nodeKey;
        $this->sharedKey = $sharedKey;
        $this->nodeSuffix = $nodeSuffix;
    }

    /**
     * Whether the cache has the requested item
     *
     * @param string $cacheIdentifier
     * @param string $encryptionMode
     *
     * @return bool
     */
    public function hasItem(string $cacheIdentifier, string $encryptionMode): bool
    {
        return $this->cache->hasItem($cacheIdentifier . $this->getSuffix($encryptionMode));
    }

    /**
     * Set an item to the cache, based on the encryption mode
     *
     * Public mode: value won't be encrypted
     * Shared mode: value will be encrypted using a key shared between all nodes
     * Node specific mode: value wil be encrypted for a single group of nodes only e.g. ssweb, iuweb or api
     * TTL is specified in seconds - 3600 means a default of one hour
     *
     * @param string $cacheKey
     * @param string $encryptionMode
     * @param mixed  $value
     * @param int    $ttl
     *
     * @throws \Exception
     * @return bool
     */
    public function setItem(string $cacheKey, string $encryptionMode, $value, int $ttl = 3600): bool
    {
        $value = igbinary_serialize($value);

        //if the encryption mode for this query is public then it need not be encrypted
        if ($encryptionMode !== self::ENCRYPTION_MODE_PUBLIC) {
            $encryptionKey = $this->getEncryptionKey($encryptionMode);
            $value = $this->encrypt($encryptionKey, $value);
        }

        $nodeSuffix = $this->getSuffix($encryptionMode);
        $this->setTtlOption($ttl);

        return $this->cache->setItem($cacheKey . $nodeSuffix, $value);
    }

    /**
     * Retrieve an item from the cache
     *
     * @param string $cacheKey
     * @param string $encryptionMode
     *
     * @throws \Exception
     * @return mixed|null
     */
    public function getItem(string $cacheKey, string $encryptionMode)
    {
        $nodeSuffix = $this->getSuffix($encryptionMode);
        $cacheValue = $this->cache->getItem($cacheKey . $nodeSuffix);

        //if the encryption mode for this query is public then it won't have been encrypted
        if ($encryptionMode !== self::ENCRYPTION_MODE_PUBLIC) {
            $encryptionKey = $this->getEncryptionKey($encryptionMode);
            $cacheValue = $this->decrypt($encryptionKey, $cacheValue);
        }

        return igbinary_unserialize($cacheValue);
    }

    /**
     * @note This isn't a great way of going about this, but there isn't a way of doing it on the zend client and
     * would rather not extend it at this stage. By making the method private we make sure only the TTL passed through
     * when each item is set will be used
     *
     * @param int $ttl time in seconds
     *
     * @return AdapterOptions
     */
    private function setTtlOption(int $ttl): AdapterOptions
    {
        return $this->cache->getOptions()->setTtl($ttl);
    }

    /**
     * Encrypt a value prior to saving in the cache
     *
     * @param string $encryptionKey
     * @param mixed  $value
     *
     * @return string
     */
    private function encrypt(string $encryptionKey, $value): string
    {
        $this->encryptor->setKey($encryptionKey);
        return $this->encryptor->encrypt($value);
    }

    /**
     * Decrypt a value using the specified encryption key
     *
     * @param string $encryptionKey
     * @param string $encryptedValue
     *
     * @return string
     */
    private function decrypt(string $encryptionKey, string $encryptedValue): string
    {
        $this->encryptor->setKey($encryptionKey);
        return $this->encryptor->decrypt($encryptedValue);
    }

    /**
     * Get the correct encryption key
     *
     * @param string $encryptionMode
     *
     * @throws \Exception
     * @return string
     */
    private function getEncryptionKey(string $encryptionMode): string
    {
        if ($encryptionMode === self::ENCRYPTION_MODE_SHARED) {
            return $this->sharedKey;
        }

        if ($encryptionMode === self::ENCRYPTION_MODE_NODE) {
            return $this->nodeKey;
        }

        throw new \Exception(self::ERR_NO_KEY_AVAILABLE);
    }

    /**
     * Get the correct suffix to use
     * (prevents the same data encrypted with a different key from having the same cache identifier)
     *
     * @param string $encryptionMode
     *
     * @return string
     */
    private function getSuffix(string $encryptionMode): string
    {
        //if saving non sensitive information we mark it with the public suffix
        if ($encryptionMode === self::ENCRYPTION_MODE_PUBLIC) {
            return self::ENCRYPTION_PUBLIC_NODE_SUFFIX;
        }

        //if using the shared encryption, use the shared suffix, otherwise be specific to the node
        if ($encryptionMode === self::ENCRYPTION_MODE_SHARED) {
            return self::ENCRYPTION_SHARED_NODE_SUFFIX;
        }

        return $this->nodeSuffix;
    }

    /**
     * Gets the encryption key for this node
     *
     * @return string
     */
    public function getNodeKey(): string
    {
        return $this->nodeKey;
    }

    /**
     * Gets the shared encryption key
     *
     * @return string
     */
    public function getSharedKey(): string
    {
        return $this->sharedKey;
    }

    /**
     * Gets the node suffix
     *
     * @return string
     */
    public function getNodeSuffix(): string
    {
        return $this->nodeSuffix;
    }
}
