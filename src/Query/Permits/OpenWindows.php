<?php

/**
 * Get all open windows across all stock
 *
 * @author Jonathan Thomas <jonathan@opalise.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query\Permits;

use Dvsa\Olcs\Transfer\FieldType\Traits\CurrentDateTime;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/permits/open-windows")
 */
class OpenWindows extends AbstractQuery
{
    use CurrentDateTime;

    /**
     * @var int
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $permitType;

    /**
     * @return int
     */
    public function getPermitType()
    {
        return $this->permitType;
    }
}
