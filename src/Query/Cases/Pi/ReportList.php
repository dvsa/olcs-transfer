<?php

namespace Dvsa\Olcs\Transfer\Query\Cases\Pi;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedTrait;
use Dvsa\Olcs\Transfer\Query\OrderedTrait;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldType;

/**
 * Class ReportList
 * @Transfer\RouteName("backend/pi/report")
 */
class ReportList extends AbstractQuery implements PagedQueryInterface, OrderedQueryInterface
{
    use PagedTrait;
    use OrderedTrait;
    use FieldType\StartDate;
    use FieldType\EndDate;

    /**
     * @Transfer\ArrayInput
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\UniqueItems"})
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *     "name":"Zend\Validator\InArray",
     *     "options": {
     *         "haystack": {"B","C","D","F","G","H","K","M","N","other"}
     *     }
     * })
     * @Transfer\Optional
     */
    protected $trafficAreas;

    /**
     * @return array
     */
    public function getTrafficAreas()
    {
        return $this->trafficAreas;
    }
}
