<?php

namespace Dvsa\Olcs\Transfer\Query\Correspondence;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * Class Correspondences
 * @Transfer\RouteName("backend/correspondence")
 */
class Correspondences extends AbstractQuery
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $organisation;

    /**
     * @return int
     */
    public function getOrganisation()
    {
        return $this->organisation;
    }
}
