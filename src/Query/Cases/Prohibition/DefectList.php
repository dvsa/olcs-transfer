<?php

namespace Dvsa\Olcs\Transfer\Query\Cases\Prohibition;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedTrait;
use Dvsa\Olcs\Transfer\Query\OrderedTrait;

use Dvsa\Olcs\Transfer\FieldType\Traits as FieldTypeTraits;

/**
 * Class Defect List
 *
 * @Transfer\RouteName("backend/defect")
 */
class DefectList extends AbstractQuery implements PagedQueryInterface, OrderedQueryInterface
{
    use PagedTrait;
    use OrderedTrait;
    use FieldTypeTraits\Cases;

    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $prohibition;

    /**
     * @return int
     */
    public function getProhibition()
    {
        return $this->prohibition;
    }
}
