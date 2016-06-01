<?php

namespace Dvsa\Olcs\Transfer\Query\Bus\Ebsr;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedQueryInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\PagedTrait;
use Dvsa\Olcs\Transfer\Query\OrderedTrait;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldTypeTraits;

/**
 * Class EbsrSubmissionList
 * @Transfer\RouteName("backend/ebsr-submission")
 */
class EbsrSubmissionList extends AbstractQuery implements PagedQueryInterface, OrderedQueryInterface
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
    protected $subType;

    /**
     * @var string
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *      "name":"Zend\Validator\InArray",
     *      "options": {
     *          "haystack": {
     *              "ebsrs_expired", "ebsrs_expiring", "ebsrs_processed", "ebsrs_published", "ebsrs_expiring",
     * "ebsrs_validated", "ebsrs_processing", "ebsrs_publishing", "ebsrs_submitted", "ebsrs_submitting",
     * "ebsrs_validating",  "ebsrs_distributed", "ebsrs_distributing", "ebsrs_failed", "ebsrs_uploaded"
     *          }
     *      }
     * })
     */
    protected $status;

    /**
     * @return string
     */
    public function getSubType()
    {
        return $this->subType;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}
