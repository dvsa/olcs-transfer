<?php

/**
 * Create an IRHP Permit Stock
 */
namespace Dvsa\Olcs\Transfer\Command\IrhpPermitStock;

use Dvsa\Olcs\Transfer\FieldType\Traits\CountryOptional;
use Dvsa\Olcs\Transfer\FieldType\Traits\EmissionsCategory;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits\IrhpPermitStockValidFrom;
use Dvsa\Olcs\Transfer\FieldType\Traits\IrhpPermitStockValidTo;
use Dvsa\Olcs\Transfer\FieldType\Traits\IrhpPermitType;
use Dvsa\Olcs\Transfer\FieldType\Traits\IrhpPermitStockInitialStock;

/**
 * @Transfer\RouteName("backend/irhp-permit-stock")
 * @Transfer\Method("POST")
 */
final class Create extends AbstractCommand
{
    use IrhpPermitStockInitialStock;
    use IrhpPermitStockValidFrom;
    use EmissionsCategory;
    use IrhpPermitStockValidTo;
    use IrhpPermitType;
    use CountryOptional;
}
