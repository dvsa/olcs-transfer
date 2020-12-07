<?php

namespace Dvsa\Olcs\Transfer\Query\TaskAlphaSplit;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/task-alpha-split")
 */
class GetList extends AbstractQuery
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $taskAllocationRule;

    public function getTaskAllocationRule()
    {
        return $this->taskAllocationRule;
    }
}
