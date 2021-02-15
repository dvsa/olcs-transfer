<?php

namespace Dvsa\Olcs\Transfer\Query\Bus;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Query\OrderedTrait;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * Class BusRegBrowseContextList
 * @Transfer\RouteName("backend/bus/browse/context-list")
 */
class BusRegBrowseContextList extends AbstractQuery implements OrderedQueryInterface
{
    use OrderedTrait;

    /**
     * @var string
     * @Transfer\Validator({
     *      "name":"Laminas\Validator\InArray",
     *      "options": {
     *          "haystack": {
     *              "eventRegistrationStatus"
     *          }
     *      }
     * })
     */
    protected $context;

    /**
     * Get context
     *
     * @return int
     */
    public function getContext()
    {
        return $this->context;
    }
}
