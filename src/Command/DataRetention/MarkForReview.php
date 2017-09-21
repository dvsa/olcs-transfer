<?php
namespace Dvsa\Olcs\Transfer\Command\DataRetention;

use Dvsa\Olcs\Transfer\FieldType\Traits\Ids;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/data-retention/update-action-confirmation")
 * @Transfer\Method("POST")
 */
final class MarkForReview extends AbstractCommand
{
    use Ids;
}
