<?php

namespace Dvsa\Olcs\Transfer\Query\Messaging\Subjects;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\CacheableLongTermQueryInterface;
use Dvsa\Olcs\Transfer\Query\PublicQueryCacheInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/messaging/subjects/all")
 */
class All extends AbstractQuery implements
    \Dvsa\Olcs\Transfer\Query\OrderedQueryInterface,
    CacheableLongTermQueryInterface,
    PublicQueryCacheInterface
{
    use \Dvsa\Olcs\Transfer\Query\OrderedTrait;
}
