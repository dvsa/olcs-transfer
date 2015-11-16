<?php

namespace Dvsa\Olcs\Transfer\Command\Submission;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractReopenCommand;

/**
 * Concrete reopen class.
 *
 * @Transfer\RouteName("backend/submission/single/reopen")
 * @Transfer\Method("PUT")
 */
class ReopenSubmission extends AbstractReopenCommand
{
    //
}
