<?php

namespace Dvsa\Olcs\Transfer\Query\Correspondence;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\PagedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedTrait;
use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Query\OrderedTrait;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * Class Correspondences
 * @Transfer\RouteName("backend/correspondence")
 */
class Correspondences extends AbstractQuery implements PagedQueryInterface, OrderedQueryInterface
{
    use PagedTrait, OrderedTrait;

    /**
     * @var int
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $organisation;

    /**
     * Get Organisation
     *
     * @return int
     */
    public function getOrganisation()
    {
        return $this->organisation;
    }
}
