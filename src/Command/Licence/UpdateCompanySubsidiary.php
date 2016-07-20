<?php

namespace Dvsa\Olcs\Transfer\Command\Licence;

use Dvsa\Olcs\Transfer\Command\Lva\AbstractUpdateCompanySubsidiary;
use Dvsa\Olcs\Transfer\FieldType\Traits\Licence;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @author Rob Caiger <rob@clocal.co.uk>
 *         
 * @Transfer\RouteName("backend/licence/named-single/company-subsidiary/single")
 * @Transfer\Method("PUT")
 */
final class UpdateCompanySubsidiary extends AbstractUpdateCompanySubsidiary
{
    use Licence;
}
