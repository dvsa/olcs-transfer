<?php

namespace Dvsa\Olcs\Transfer\Query\BusRegSearchView;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Query\OrderedTrait;

/**
 * Class BusRegSearchViewList
 * @Transfer\RouteName("backend/bus-reg-search-view-list")
 */
class BusRegSearchViewList extends AbstractQuery implements OrderedQueryInterface
{
    use OrderedTrait;

    /**
     * @var string
     * @Transfer\Validator({
     *      "name":"Zend\Validator\InArray",
     *      "options": {
     *          "haystack": {
     *              "organisationName","licNo","busRegStatusId"
     *          }
     *      }
     * })
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
