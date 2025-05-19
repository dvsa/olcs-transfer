<?php

declare(strict_types=1);

namespace Dvsa\Olcs\Transfer\Command\Application;

use Dvsa\Olcs\Transfer\FieldType\Traits\EvidenceUploadType;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractIdOnlyCommand;

/**
 * @Transfer\RouteName("backend/application/single/main-occupation-evidence")
 * @Transfer\Method("PUT")
 */
final class UpdateMainOccupationEvidence extends AbstractIdOnlyCommand
{
    use EvidenceUploadType;
}
