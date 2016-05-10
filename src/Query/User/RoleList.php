<?php

namespace Dvsa\Olcs\Transfer\Query\User;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\CachableMediumTermQueryInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * Class Role List
 * @Transfer\RouteName("backend/user/roles")
 */
class RoleList extends AbstractQuery implements CachableMediumTermQueryInterface
{
}
