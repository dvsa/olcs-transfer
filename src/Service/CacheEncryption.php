<?php

namespace Dvsa\Olcs\Transfer\Service;

use Laminas\Cache\Storage\Adapter\AdapterOptions;
use Laminas\Cache\Storage\StorageInterface;
use Laminas\Crypt\BlockCipher;

class CacheEncryption
{
    const ERR_NO_KEY_AVAILABLE = 'No encryption key available for this encryption mode';
    const ERR_NO_IDS_TO_DELETE = 'Please provide ids for the items being deleted';

    const ENCRYPTION_MODE_PUBLIC = 'encryption_public';
    const ENCRYPTION_MODE_SHARED = 'encryption_shared';
    const ENCRYPTION_MODE_NODE = 'encryption_node';

    const ENCRYPTION_PUBLIC_NODE_SUFFIX = 'public';
    const ENCRYPTION_SHARED_NODE_SUFFIX = 'shared';

    const TTL_DEFAULT = 3600;
    const TTL_2_MINUTES = 120;
    const TTL_60_DAYS = 5184000;

    const TRANSLATION_KEY_IDENTIFIER = 'translation_key';
    const TRANSLATION_REPLACEMENT_IDENTIFIER = 'translation_replacement';

    const USER_ACCOUNT_IDENTIFIER = 'user_account';

    /** @var string[] a list of caches held against a user id */
    const USER_CACHES = [
        self::USER_ACCOUNT_IDENTIFIER
    ];

    const CUSTOM_CACHE_TYPE = [
        self::TRANSLATION_KEY_IDENTIFIER => [
            'mode' => self::ENCRYPTION_MODE_PUBLIC,
            'ttl' => self::TTL_60_DAYS,
        ],
        self::TRANSLATION_REPLACEMENT_IDENTIFIER => [
            'mode' => self::ENCRYPTION_MODE_PUBLIC,
            'ttl' => self::TTL_60_DAYS,
        ],
        self::USER_ACCOUNT_IDENTIFIER => [
            'mode' => self::ENCRYPTION_MODE_SHARED,
            'ttl' => self::TTL_2_MINUTES,
        ],
    ];

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
     * Whether a custom (non-CQRS) cache item exists
     *
     * @param string $cacheType
     * @param string $uniqueId
     *
     * @return bool
     * @throws \Exception
     */
    public function hasCustomItem(string $cacheType, string $uniqueId = ''): bool
    {
        $cacheConfig = $this->getCustomCacheConfig($cacheType);
        return $this->hasItem($cacheType . $uniqueId, $cacheConfig['mode']);
    }

    /**
     * Remove an item from the cache, based on the encryption mode
     *
     * Public mode: value won't be encrypted
     * Shared mode: value will have been encrypted using a key shared between all nodes
     * Node specific mode: value will have been encrypted for a single group of nodes only e.g. ssweb, iuweb or api
     *
     * @todo https://jira.dvsacloud.uk/browse/OLCS-28306
     * The suppression of errors here is due to Laminas using deprecated methods
     * This will be fixed by an upgrade to the laminas-cache package, covered by the above ticket
     *
     * @param string $cacheKey
     * @param string $encryptionMode
     *
     * @throws \Exception
     * @return bool
     */
    public function removeItem(string $cacheKey, string $encryptionMode): bool
    {
        $nodeSuffix = $this->getSuffix($encryptionMode);
        return @$this->cache->removeItem($cacheKey . $nodeSuffix);
    }

    /**
     * Remove a custom (non CQRS) cache item
     *
     * @todo https://jira.dvsacloud.uk/browse/OLCS-28306
     * The suppression of errors here is due to Laminas using deprecated methods
     * This will be fixed by an upgrade to the laminas-cache package, covered by the above ticket
     *
     * @param string $cacheKey
     * @param string $uniqueId
     *
     * @throws \Exception
     * @return int
     */
    public function removeCustomItem(string $cacheKey, string $uniqueId = ''): bool
    {
        $cacheConfig = $this->getCustomCacheConfig($cacheKey);
        return @$this->cache->removeItem($cacheKey . $uniqueId, $cacheConfig['mode']);
    }

    /**
     * Remove a series of custom caches e.g. for a series of user ids
     * Note that the method expects that ids will be included, to delete a cache which isn't specific
     * to a user/licence etc, use the removeCustomItem method which allows a blank value for $uniqueId
     *
     * @todo https://jira.dvsacloud.uk/browse/OLCS-28306
     * The suppression of errors here is due to Laminas using deprecated methods
     * This will be fixed by an upgrade to the laminas-cache package, covered by the above ticket
     *
     * @param string $cacheKey
     * @param array  $uniqueIds
     *
     * @throws \Exception
     * @return array
     */
    public function removeCustomItems(string $cacheKey, array $uniqueIds): array
    {
        if (empty($uniqueIds)) {
            throw new \Exception(self::ERR_NO_IDS_TO_DELETE);
        }

        $cacheKeys = [];
        $cacheConfig = $this->getCustomCacheConfig($cacheKey);
        $nodeSuffix = $this->getSuffix($cacheConfig['mode']);

        foreach ($uniqueIds as $uniqueId) {
            $cacheKeys[$uniqueId] = $cacheKey . $uniqueId . $nodeSuffix;
        }

        return @$this->cache->removeItems($cacheKeys);
    }

    /**
     * Set an item to the cache, based on the encryption mode
     *
     * Public mode: value won't be encrypted
     * Shared mode: value will be encrypted using a key shared between all nodes
     * Node specific mode: value will be encrypted for a single group of nodes only e.g. ssweb, iuweb or api
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
     * Set a custom (non-CQRS) cache, based on config for TTL and encryption mode.
     *
     * @param string $cacheType must exist in the config or exception will be thrown
     * @param mixed  $value     value to be set in the cache
     * @param string $uniqueId  optional suffix to add uniqueness, such as a translation locale or user id
     *
     * @throws \Exception
     * @return bool
     */
    public function setCustomItem(string $cacheType, $value, $uniqueId = ''): bool
    {
        $cacheConfig = $this->getCustomCacheConfig($cacheType);
        return $this->setItem($cacheType . $uniqueId, $cacheConfig['mode'], $value, $cacheConfig['ttl']);
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
     * Retrieve a custom (non-CQRS) cache based on the config
     *
     * @param string $cacheType must exist in the config or exception will be thrown
     * @param string $uniqueId  optional suffix to add uniqueness, such as a translation locale or user id
     *
     * @return mixed|null
     * @throws \Exception
     */
    public function getCustomItem(string $cacheType, string $uniqueId = '')
    {
        $cacheConfig = $this->getCustomCacheConfig($cacheType);
        return $this->getItem($cacheType . $uniqueId, $cacheConfig['mode']);
    }

    /**
     * @note This isn't a great way of going about this, but there isn't a way of doing it on the Laminas client and
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
     * Get (and check validity of) config for a custom cache type
     *
     * @param $cacheType
     *
     * @return array
     * @throws \Exception
     */
    private function getCustomCacheConfig($cacheType): array
    {
        if (!isset(self::CUSTOM_CACHE_TYPE[$cacheType])) {
            throw new \Exception('missing config for cache type ' . $cacheType);
        }

        $cacheConfig = self::CUSTOM_CACHE_TYPE[$cacheType];

        if (!isset($cacheConfig['mode'])) {
            throw new \Exception('missing encryption mode for cache type ' . $cacheType);
        }

        if (!isset($cacheConfig['ttl'])) {
            $cacheConfig['ttl'] = self::TTL_DEFAULT;
        }

        return $cacheConfig;
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
