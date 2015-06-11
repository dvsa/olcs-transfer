<?php

namespace Dvsa\Olcs\Transfer\Query\Cases\Prohibition;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

use Dvsa\Olcs\Transfer\FieldType\Traits as FieldTypeTraits;

/**
 * Class Defect
 *
 * @Transfer\RouteName("backend/defect/single")
 */
class Defect extends AbstractQuery
{
    use FieldTypeTraits\Identity;

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
