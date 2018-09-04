<?php

/**
 * Update IRHP Permit Stock
 */
namespace Dvsa\Olcs\Transfer\Command\IrhpPermitStock;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\FieldType\Traits\IrhpPermitStockInitialStock;
use Dvsa\Olcs\Transfer\FieldType\Traits\IrhpPermitStockType;
use Dvsa\Olcs\Transfer\FieldType\Traits\IrhpPermitStockValidFrom;
use Dvsa\Olcs\Transfer\FieldType\Traits\IrhpPermitStockValidTo;

/**
 * @Transfer\RouteName("backend/irhp-permit-stock/single")
 * @Transfer\Method("PUT")
 */
final class Update extends AbstractCommand
{
    use Identity;
    use IrhpPermitStockInitialStock;
    use IrhpPermitStockType;
    use IrhpPermitStockValidFrom;
    use IrhpPermitStockValidTo;
}
