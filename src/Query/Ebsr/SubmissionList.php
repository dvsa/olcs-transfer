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
     */
    protected $ebsrSubmissionType;

    /**
     * @var string
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
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
