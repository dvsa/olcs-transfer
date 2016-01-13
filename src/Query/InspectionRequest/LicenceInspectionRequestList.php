<?php

namespace Dvsa\Olcs\Transfer\Query\InspectionRequest;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\OrderedTrait;
use Dvsa\Olcs\Transfer\Query\PagedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedTrait;

/**
 * Class InspectionRequest
 * 
 * @Transfer\RouteName("backend/inspection-request/licence")
 */
class LicenceInspectionRequestList extends AbstractQuery implements PagedQueryInterface, OrderedQueryInterface
{
    use PagedTrait,
        OrderedTrait;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $licence;

    /**
     * @return string
     */
    public function getLicence()
    {
        return $this->licence;
    }
}
