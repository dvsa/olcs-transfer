<?php

namespace Dvsa\Olcs\Transfer\Query\BusRegSearchView;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedTrait;
use Dvsa\Olcs\Transfer\Query\OrderedTrait;

use Dvsa\Olcs\Transfer\FieldType\Traits as FieldTypeTraits;

/**
 * Class Bus Reg List for Organisation or LA
 * @Transfer\RouteName("backend/bus-reg-search-view-list")
 */
class BusRegSearchViewList extends AbstractQuery implements PagedQueryInterface, OrderedQueryInterface
{
    use PagedTrait;
    use OrderedTrait;

    /**
     * @var int
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $licId;

    /**
     * @var int
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $organisationId;

    /**
     * @var String
     * @Transfer\Optional
     * @Transfer\Validator({
     *     "name":"Zend\Validator\InArray",
     *     "options": {
     *          "haystack": {
     *              "breg_s_admin","breg_s_cancellation","breg_s_cancelled","breg_s_cns","breg_s_curt","breg_s_expired",
     *              "breg_s_new","breg_s_refused","breg_s_registered","breg_s_revoked","breg_s_surr","breg_s_var",
     *              "breg_s_withdrawn"
     *          }
     *     }
     * })
     */
    protected $busRegStatus;

    /**
     * @return int
     */
    public function getLicId()
    {
        return $this->licId;
    }

    /**
     * @return int
     */
    public function getOrganisationId()
    {
        return $this->organisationId;
    }

    /**
     * Setter required to apply default Organisation ID for Operator queries.
     *
     * @param int $organisationId
     */
    public function setOrganisationId($organisationId)
    {
        $this->organisationId = $organisationId;
    }

    /**
     * @return String
     */
    public function getBusRegStatus()
    {
        return $this->busRegStatus;
    }
}