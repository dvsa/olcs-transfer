<?php

namespace Dvsa\Olcs\Transfer\Query;

use Dvsa\Olcs\Transfer\Service\CacheEncryption;
use Zend\InputFilter\InputFilterInterface;

/**
 * Query Container
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
class QueryContainer implements QueryContainerInterface
{
    protected $routeName;

    protected $hasValidated = false;

    /**
     * @var InputFilterInterface
     */
    protected $inputFilter;

    /**
     * @var QueryInterface
     */
    protected $dto;

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        $this->inputFilter = $inputFilter;
    }

    public function getInputFilter()
    {
        return $this->inputFilter;
    }

    /**
     * Can the DTO be cached for short term
     *
     * @return bool
     */
    public function isShortTermCachable()
    {
        return ($this->dto instanceof CachableShortTermQueryInterface);
    }

    /**
     * Can the DTO be cached for medium term
     *
     * @return bool
     */
    public function isMediumTermCachable()
    {
        return ($this->dto instanceof CachableMediumTermQueryInterface);
    }

    /**
     * Whether the cached query response should be encrypted - see notes on PublicQueryCacheInterface
     *
     * @return bool
     */
    public function isPublicCachable(): bool
    {
        return ($this->dto instanceof PublicQueryCacheInterface);
    }

    /**
     * whether to encrypt and decrypt using the shared encryption key - see notes on SharedEncryptionCacheInterface
     *
     * @return bool
     */
    public function isSharedEncryptionCachable(): bool
    {
        return ($this->dto instanceof SharedEncryptionCacheInterface);
    }

    /**
     * Is query should use stream
     *
     * @return bool
     */
    public function isStream()
    {
        return ($this->dto instanceof StreamInterface);
    }

    /**
     * Get the identifier used to cache the DTO with
     *
     * @return string
     */
    public function getCacheIdentifier()
    {
        $dtoClassName = get_class($this->dto);
        $jsonData = json_encode($this->dto->getArrayCopy());

        return md5($dtoClassName . '-' . $jsonData);
    }

    public function setDto(QueryInterface $dto)
    {
        $this->dto = $dto;
    }

    public function getDto()
    {
        return $this->dto;
    }

    /**
     * Get the class name of the current DTO
     *
     * @return string
     */
    public function getDtoClassName(): string
    {
        return get_class($this->dto);
    }

    public function setRouteName($routeName)
    {
        $this->routeName = $routeName;
    }

    public function getRouteName()
    {
        return $this->routeName;
    }

    public function isValid()
    {
        $this->hasValidated = true;

        $this->inputFilter->setData($this->dto->getArrayCopy());
        $this->dto->exchangeArray($this->inputFilter->getValues());

        return $this->inputFilter->isValid();
    }

    public function getMessages()
    {
        if ($this->hasValidated === false) {
            throw new \Exception('Validation has not yet occurred');
        }

        return $this->inputFilter->getMessages();
    }

    /**
     * Return the encryption mode to be used if this query is cached
     *
     * @return string
     */
    public function getEncryptionMode(): string
    {
        if ($this->isPublicCachable()) {
            return CacheEncryption::ENCRYPTION_MODE_PUBLIC;
        }

        if ($this->isSharedEncryptionCachable()) {
            return CacheEncryption::ENCRYPTION_MODE_SHARED;
        }

        return CacheEncryption::ENCRYPTION_MODE_NODE;
    }
}
