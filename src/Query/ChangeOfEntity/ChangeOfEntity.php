<?php

/**
 * Change Of Entity
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
namespace Dvsa\Olcs\Transfer\Query\ChangeOfEntity;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\Query\CachableShortTermQueryInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/change-of-entity/single")
 */
class ChangeOfEntity extends AbstractQuery implements CachableShortTermQueryInterface
{
    use Identity;
}
