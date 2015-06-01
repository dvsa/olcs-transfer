<?php

namespace Dvsa\Olcs\Transfer\Query\Cases;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * Class LegacyOffenceList
 * @Transfer\RouteName("backend/cases/legacy-offence")
 */
class LegacyOffenceList extends AbstractQuery
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $case;

    /**
     * @return int
     */
    public function getCase()
    {
        return $this->case;
    }
}
