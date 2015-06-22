<?php

namespace Dvsa\Olcs\Transfer\Query\TmEmployment;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * Class GetSingle
 *
 * @Transfer\RouteName("backend/tm-employment/single")
 */
class GetSingle extends AbstractQuery
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $id;

    /**
     * Get TmEmployment ID
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
