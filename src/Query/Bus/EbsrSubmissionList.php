<?php

namespace Dvsa\Olcs\Transfer\Query\Bus;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedQueryInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\PagedTrait;
use Dvsa\Olcs\Transfer\Query\OrderedTrait;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldTypeTraits;

/**
 * Class EbsrSubmissionList
 * @Transfer\RouteName("backend/bus/ebsr-submission-list")
 */
class EbsrSubmissionList extends AbstractQuery
    implements PagedQueryInterface, OrderedQueryInterface
{
    use PagedTrait;
    use OrderedTrait;

    /**
     * @var string
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *      "name":"Zend\Validator\InArray",
     *      "options": {
     *          "haystack": {
     *              "ebsrt_new", "ebsrt_refresh"
     *          }
     *      }
     * })
     */
    protected $registrationType;

    /**
     * @var string
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *      "name":"Zend\Validator\InArray",
     *      "options": {
     *          "haystack": {
     *              "ebsrs_expired", "ebsrs_expiring", "ebsrs_processed", "ebsrs_published", "ebsrs_expiring",
     * "ebsrs_validated", "ebsrs_processing", "ebsrs_publishing", "ebsrs_submitting", "ebsrs_validating",
     * "ebsrs_distributed", "ebsrs_distributing"
     *          }
     *      }
     * })
     */
    protected $status;

    /**
     * @return int
     */
    public function getCase()
    {
        return $this->case;
    }

    /**
     * @return string
     */
    public function getRegistrationType()
    {
        return $this->registrationType;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

}
