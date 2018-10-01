<?php

/**
 * Complete ECMT Issue Fee paynment
 *
 * @author Andy Newton <andy@vitri.ltd>
 */
namespace Dvsa\Olcs\Transfer\Command\Permits;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/permits/ecmt-permits-issue-paid")
 * @Transfer\Method("POST")
 */
final class CompleteIssuePayment extends AbstractCommand
{
    use Identity;
}
