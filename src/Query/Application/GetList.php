<?php

namespace Dvsa\Olcs\Transfer\Query\Application;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedQueryInterface;
use Dvsa\Olcs\Transfer\Query\OrderedTraitOptional;
use Dvsa\Olcs\Transfer\Query\PagedTrait;

/**
 * @Transfer\RouteName("backend/application")
 */
final class GetList extends AbstractQuery implements OrderedQueryInterface, PagedQueryInterface
{
    use OrderedTraitOptional,
        PagedTrait;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $organisation;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Filter({"name":"Laminas\Filter\StringToLower"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\ApplicationStatus"})
     * @Transfer\Optional
     */
    protected $status;

    /**
     * Get a Organsation ID
     *
     * @return int
     */
    public function getOrganisation()
    {
        return $this->organisation;
    }

    /**
     * Get a Status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }
}
