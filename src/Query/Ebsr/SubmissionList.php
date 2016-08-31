<?php

namespace Dvsa\Olcs\Transfer\Query\Ebsr;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedTrait;
use Dvsa\Olcs\Transfer\Query\OrderedTrait;

/**
 * Class SubmissionList
 * @Transfer\RouteName("backend/ebsr/submission-list")
 */
class SubmissionList extends AbstractQuery implements PagedQueryInterface, OrderedQueryInterface
{
    use PagedTrait;
    use OrderedTrait;

    /**
     * @var string
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator(
     *  {
     *      "name":"Zend\Validator\InArray",
     *      "options": {"haystack": {"ebsrt_map", "ebsrt_new", "ebsrt_refresh", "ebsrt_unknown"}}
     *  }
     * )
     */
    protected $ebsrSubmissionType;

    /**
     * @var string
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator(
     *  {
     *      "name":"Zend\Validator\InArray",
     *      "options": {
     *          "haystack": {
     *              "ebsrs_processed",
     *              "ebsrs_processing",
     *              "ebsrs_submitted",
     *              "ebsrs_validating",
     *              "ebsrs_failed",
     *              "ebsrs_uploaded"
     *          }
     *      }
     *  }
     * )
     */
    protected $ebsrSubmissionStatus;

    /**
     * @return string
     */
    public function getEbsrSubmissionType()
    {
        return $this->ebsrSubmissionType;
    }

    /**
     * @return string
     */
    public function getEbsrSubmissionStatus()
    {
        return $this->ebsrSubmissionStatus;
    }
}
