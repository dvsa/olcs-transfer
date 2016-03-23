<?php

/**
 * User List Internal
 */
namespace Dvsa\Olcs\Transfer\Query\User;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/user/internal-only")
 */
final class UserListInternal extends AbstractQuery implements \Dvsa\Olcs\Transfer\Query\OrderedQueryInterface
{
    use \Dvsa\Olcs\Transfer\Query\OrderedTrait;

    /**
     * Get team Id
     *
     * @return int
     */
    public function getIsInternal()
    {
        return true;
    }
}
