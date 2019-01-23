<?php

/**
 * Get a list of IRHP Applications and ECMT Permit Applications
 *
 * @author Scott Callaway <scott.callaway@capgemini.com>
 */
namespace Dvsa\Olcs\Transfer\Query\IrhpApplication;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Query\OrderedTrait;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldTypeTraits;

/**
 * @Transfer\RouteName("backend/irhp-application/get-all-by-organisation")
 */
final class GetAllByOrganisation extends AbstractQuery implements OrderedQueryInterface
{
    use OrderedTrait;
    use FieldTypeTraits\Organisation;
    use FieldTypeTraits\IrhpApplicationStatusesOptional;
}
