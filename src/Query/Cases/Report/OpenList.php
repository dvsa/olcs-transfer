<?php

namespace Dvsa\Olcs\Transfer\Query\Cases\Report;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\PagedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedTrait;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/cases/report/open")
 */
class OpenList extends AbstractQuery implements PagedQueryInterface
{
    use PagedTrait;
}
