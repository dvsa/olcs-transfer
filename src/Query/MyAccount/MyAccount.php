<?php

namespace Dvsa\Olcs\Transfer\Query\MyAccount;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\CachableShortTermQueryInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * Class MyAccount
 * @Transfer\RouteName("backend/my-account")
 */
class MyAccount extends AbstractQuery implements CachableShortTermQueryInterface
{
}
