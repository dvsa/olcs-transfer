<?php

namespace Dvsa\Olcs\Transfer\Query;

use Zend\InputFilter\InputFilterInterface;

/**
 * Query Container Interface
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
interface QueryContainerInterface
{
    public function setInputFilter(InputFilterInterface $inputFilter);

    public function getInputFilter();

    public function isShortTermCachable();

    public function isMediumTermCachable();

    public function isPublicCachable(): bool;

    public function isSharedEncryptionCachable(): bool;

    public function isStream();

    public function getCacheIdentifier();

    public function setDto(QueryInterface $dto);

    public function getDto();

    public function getDtoClassName(): string;

    public function setRouteName($routeName);

    public function getRouteName();

    public function isValid();

    public function getMessages();

    public function getEncryptionMode(): string;
}
