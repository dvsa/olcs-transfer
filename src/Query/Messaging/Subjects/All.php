<?php

namespace Dvsa\Olcs\Transfer\Query\Messaging\Subjects;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\CacheableLongTermQueryInterface;
use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Query\OrderedTrait;
use Dvsa\Olcs\Transfer\Query\PublicQueryCacheInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/messaging/subjects/all")
 */
class All extends AbstractQuery implements
    OrderedQueryInterface,
    CacheableLongTermQueryInterface,
    PublicQueryCacheInterface
{
    use OrderedTrait;

    /**
     * @Transfer\Filter("Laminas\Filter\Digits")
     * @Transfer\Validator("Laminas\Validator\Digits")
     */
    protected int $isActive;

    public function setIsActive($isActive): void
    {
        $this->isActive = $isActive;
    }

    /**
     * Get the is active
     */
    public function getIsActive(): int
    {
        return $this->isActive;
    }
}
