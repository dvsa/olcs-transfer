<?php
declare(strict_types=1);

namespace Dvsa\Olcs\Transfer\Query\DvlaSearch;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/dvla-search/vehicle")
 */
class Vehicle extends AbstractQuery
{
    /**
     * @var string
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Filter({
     *     "name":"Zend\Filter\PregReplace",
     *     "options": {"pattern": "/[\s]/", "replacement": ""}
     * })
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options": {"min": 3, "max":10}})
     * @Transfer\Validator({
     *     "name":"Zend\Validator\Regex",
     *     "options": {"pattern": "/^[a-zA-Z0-9]*$/"}
     * })
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
