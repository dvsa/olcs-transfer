<?php

namespace Dvsa\Olcs\Transfer\Query\Fee;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\PublicQueryCacheInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

use Dvsa\Olcs\Transfer\FieldType;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldTypeTraits;
use Dvsa\Olcs\Transfer\Query\CachableMediumTermQueryInterface;

/**
 * Class FeeType
 * @Transfer\RouteName("backend/fee-type/single")
 */
class FeeType extends AbstractQuery implements
    FieldType\IdentityInterface,
    CachableMediumTermQueryInterface,
    PublicQueryCacheInterface
{
    use FieldTypeTraits\Identity;
}
