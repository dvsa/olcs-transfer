<?php

/**
 * Country Select List
 *
 */
namespace Dvsa\Olcs\Transfer\Query\ContactDetail;

use Dvsa\Olcs\Transfer\FieldType\Traits\IsEcmtStateOptional;
use Dvsa\Olcs\Transfer\FieldType\Traits\IsEeaStateOptional;
use Dvsa\Olcs\Transfer\Query\CachableMediumTermQueryInterface;
use Dvsa\Olcs\Transfer\Query\PublicQueryCacheInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/country-select-list")
 */
class CountrySelectList extends AbstractQuery implements CachableMediumTermQueryInterface, PublicQueryCacheInterface
{
    use IsEcmtStateOptional,
        IsEeaStateOptional;
}
