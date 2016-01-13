<?php

namespace Dvsa\Olcs\Transfer\Query\TmEmployment;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * Class GetList
 *
 * @Transfer\RouteName("backend/tm-employment")
 */
class GetList extends AbstractQuery
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $transportManager;

    /**
     * ID
     * @return int
     */
    public function getTransportManager()
    {
        return $this->transportManager;
    }
}
