<?php

namespace Dvsa\Olcs\Transfer\Query\Cases\ProposeToRevoke;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * Class ProposeToRevokeByCase
 * @Transfer\RouteName("backend/propose-to-revoke/case")
 */
class ProposeToRevokeByCase extends AbstractQuery
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
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
