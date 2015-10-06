<?php

namespace Dvsa\Olcs\Transfer\Command\Ebsr;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * Class Submission Create
 *
 * @Transfer\RouteName("backend/ebsr-submission/create")
 */
class SubmissionCreate extends AbstractCommand
{
    use Identity;
}
