<?php

/**
 * Get a list of IRHP Sectors
 *
 * @author Scott Callaway <scott.callaway@capgemini.com>
 */
namespace Dvsa\Olcs\Transfer\Query\IrhpPermitSector;

use Dvsa\Olcs\Transfer\FieldType\Traits\IrhpPermitStock;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedTrait;
use Dvsa\Olcs\Transfer\Query\OrderedTrait;

/**
 * @Transfer\RouteName("backend/irhp-permit-sector")
 */
final class GetList extends AbstractQuery implements PagedQueryInterface, OrderedQueryInterface
{
    use PagedTrait;
    use OrderedTrait;
    use IrhpPermitStock;
}
