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
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $organisation;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Filter({"name":"Zend\Filter\StringToLower"})
     * @Transfer\Validator({
     *     "name":"Zend\Validator\InArray",
     *     "options":{
     *          "haystack": {
     *              "apsts_not_submitted",
     *              "apsts_granted",
     *              "apsts_consideration",
     *              "apsts_valid",
     *              "apsts_withdrawn",
     *              "apsts_refused",
     *              "apsts_ntu",
     *              "apsts_cancelled",
     *           },
     *     },
     * })
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
