<?php

namespace Dvsa\Olcs\Transfer\Query\BusRegSearchView;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Query\OrderedTrait;

/**
 * Class BusRegSearchViewContextList
 * @Transfer\RouteName("backend/bus-reg-search-view-context-list")
 */
class BusRegSearchViewContextList extends AbstractQuery implements OrderedQueryInterface
{
    use OrderedTrait;

    /**
     * @var string
     * @Transfer\Validator("Laminas\Validator\InArray",
     *      options={
     *          "haystack": {
     *              "organisation","licence","busRegStatus"
     *          }
     *      }
     * )
     */
    protected $context;

    /**
     * @return int
     */
    public function getContext()
    {
        return $this->context;
    }
}
