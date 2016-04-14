<?php

namespace Dvsa\Olcs\Transfer\Command\TaskAllocationRule;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/task-allocation-rule")
 * @Transfer\Method("POST")
 */
final class Create extends AbstractCommand
{
    use \Dvsa\Olcs\Transfer\FieldType\Traits\Category,
        \Dvsa\Olcs\Transfer\FieldType\Traits\Team,
        \Dvsa\Olcs\Transfer\FieldType\Traits\UserOptional,
        \Dvsa\Olcs\Transfer\FieldType\Traits\GoodsOrPsvOptional,
        \Dvsa\Olcs\Transfer\FieldType\Traits\IsMlh,
        \Dvsa\Olcs\Transfer\FieldType\Traits\TrafficAreaOptional;
}
