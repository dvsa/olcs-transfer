<?php

namespace Dvsa\Olcs\Transfer\Query\Fee;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedQueryInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\PagedTrait;
use Dvsa\Olcs\Transfer\Query\OrderedTrait;

use Dvsa\Olcs\Transfer\FieldType;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldTypeTraits;

/**
 * Class FeeList
 * @Transfer\RouteName("backend/fee")
 */
class FeeList extends AbstractQuery
    implements
    PagedQueryInterface,
    OrderedQueryInterface,
    FieldType\ApplicationInterface,
    FieldType\LicenceInterface,
    FieldType\TaskInterface,
    FieldType\BusRegInterface,
    FieldType\IrfoGvPermitInterface
{
    use PagedTrait;
    use OrderedTrait;

    // Foreign Keys
    use FieldTypeTraits\ApplicationOptional;
    use FieldTypeTraits\LicenceOptional;
    use FieldTypeTraits\TaskOptional;
    use FieldTypeTraits\BusRegOptional;
    use FieldTypeTraits\IrfoGvPermitOptional;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Boolean"})
     */
    protected $isMiscellaneous;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *  "name":"Zend\Validator\InArray",
     *  "options": {"haystack": {"current","historical","all"}}
     * })
     */
    protected $status;

    /**
     * @return int
     */
    public function getIsMiscellaneous()
    {
        return $this->isMiscellaneous;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}
