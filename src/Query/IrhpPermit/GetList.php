<?php

/**
 * Get a list of IRHP Stocks
 *
 * @author Andy Newton <andy@vitri.ltd>
 */
namespace Dvsa\Olcs\Transfer\Query\IrhpPermit;

use Dvsa\Olcs\Transfer\FieldType\Traits\IrhpPermitApplication;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedTrait;
use Dvsa\Olcs\Transfer\Query\OrderedTrait;

/**
 * @Transfer\RouteName("backend/irhp-permits")
 */
final class GetList extends AbstractQuery implements PagedQueryInterface, OrderedQueryInterface
{
    use PagedTrait;
    use OrderedTrait;
    use IrhpPermitApplication;
}
