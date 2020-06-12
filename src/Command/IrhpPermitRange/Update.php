<?php

/**
 * Create an IRHP Permit Range
 */
namespace Dvsa\Olcs\Transfer\Command\IrhpPermitRange;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits\CabotageOptional;
use Dvsa\Olcs\Transfer\FieldType\Traits\EmissionsCategory;
use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\FieldType\Traits\JourneyOptional;
use Dvsa\Olcs\Transfer\FieldType\Traits\IrhpPermitRangePrefix;
use Dvsa\Olcs\Transfer\FieldType\Traits\IrhpPermitRangeFrom;
use Dvsa\Olcs\Transfer\FieldType\Traits\IrhpPermitRangeTo;
use Dvsa\Olcs\Transfer\FieldType\Traits\IrhpPermitRangeIsLostReplacement;
use Dvsa\Olcs\Transfer\FieldType\Traits\IrhpPermitRangeSsReserve;
use Dvsa\Olcs\Transfer\FieldType\Traits\IrhpPermitRangeRestrictedCountries;
use Dvsa\Olcs\Transfer\FieldType\Traits\IrhpPermitStock;

/**
 * @Transfer\RouteName("backend/irhp-permit-range/single")
 * @Transfer\Method("PUT")
 */
final class Update extends AbstractCommand
{
    use Identity;
    use JourneyOptional;
    use IrhpPermitStock;
    use EmissionsCategory;
    use IrhpPermitRangePrefix;
    use IrhpPermitRangeFrom;
    use IrhpPermitRangeTo;
    use CabotageOptional;
    use IrhpPermitRangeIsLostReplacement;
    use IrhpPermitRangeSsReserve;
    use IrhpPermitRangeRestrictedCountries;
}
