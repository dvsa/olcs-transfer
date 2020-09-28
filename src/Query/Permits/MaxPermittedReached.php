<?php

/**
 * Establish whether the max permitted number of permits has been reached
 */
namespace Dvsa\Olcs\Transfer\Query\Permits;

use Dvsa\Olcs\Transfer\FieldType\Traits\IrhpPermitStock;
use Dvsa\Olcs\Transfer\FieldType\Traits\Licence;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/permits/max-permitted-reached")
 */
class MaxPermittedReached extends AbstractQuery
{
    use IrhpPermitStock, Licence;
}
