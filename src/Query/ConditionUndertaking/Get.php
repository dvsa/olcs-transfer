<?php

/**
 * Get a ConditionUndertaking
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query\ConditionUndertaking;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/condition-undertaking/single")
 */
class Get extends AbstractQuery
{
    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $id;

    public function getId()
    {
        return $this->id;
    }
}
