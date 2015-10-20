<?php

namespace Dvsa\Olcs\Transfer\Query\User;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\CachableQueryInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * Class Roles
 * @Transfer\RouteName("backend/user/roles")
 */
class Roles extends AbstractQuery implements CachableQueryInterface
{
}
