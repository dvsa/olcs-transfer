<?php

/**
 * Outstanding Fees
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
namespace Dvsa\Olcs\Transfer\Query\Application;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/application/single/outstanding-fees")
 */
class OutstandingFees extends AbstractQuery
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $id;

    public function getId()
    {
        return $this->id;
    }
}
