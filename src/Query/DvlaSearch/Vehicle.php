<?php
declare(strict_types=1);

namespace Dvsa\Olcs\Transfer\Query\DvlaSearch;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/dvla-seach/vehicle")
 */
class Vehicle extends AbstractQuery
{
    /**
     * @var string
     * @Transfer\Filter({"name":"Zend\Filter\String"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options": {"min": 3, "max":10}})
     */
    protected $vrn;

    /**
     * @return mixed
     */
    public function getVrn()
    {
        return $this->vrn;
    }
}
