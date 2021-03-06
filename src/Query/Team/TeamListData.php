<?php

/**
 * Get a list of all teams for select
 */
namespace Dvsa\Olcs\Transfer\Query\Team;

use Dvsa\Olcs\Transfer\Query\AbstractListData;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\CacheableShortTermQueryInterface;

/**
 * @Transfer\RouteName("backend/team/list-data")
 */
final class TeamListData extends AbstractListData implements CacheableShortTermQueryInterface
{
}
