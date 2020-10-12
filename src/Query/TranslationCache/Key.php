<?php

/**
 * @note this command is used as a backup when the Redis translation cache is unavailable. Therefore it also triggers
 * a rebuild of the translation cache in the backend. As such, please don't reuse this command for anything else :)
 *
 * @author Ian Lindsay <ian@hemera-business-services.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query\TranslationCache;

use Dvsa\Olcs\Transfer\Query\CacheableShortTermQueryInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/translation-cache-key")
 */
class Key extends AbstractQuery implements CacheableShortTermQueryInterface
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\Locale"})
     */
    protected $id;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}
