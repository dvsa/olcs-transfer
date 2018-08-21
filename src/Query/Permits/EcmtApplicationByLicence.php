<?php

namespace Dvsa\Olcs\Transfer\Query\Permits;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\CachableShortTermQueryInterface;
use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedQueryInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\PagedTrait;
use Dvsa\Olcs\Transfer\Query\OrderedTrait;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldTypeTraits;

/**
 * Class EcmtApplicationByLicence
 * @Transfer\RouteName("backend/permits/ecmt-application-by-licence")
 */
class EcmtApplicationByLicence extends AbstractQuery implements PagedQueryInterface, OrderedQueryInterface, CachableShortTermQueryInterface
{
    use PagedTrait;
    use OrderedTrait;
    use FieldTypeTraits\Licence;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Optional
     */
    protected $status = null;

    public function getStatus() {
        return $this->status;
    }
}
