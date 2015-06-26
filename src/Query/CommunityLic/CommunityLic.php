<?php

namespace Dvsa\Olcs\Transfer\Query\CommunityLic;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\OrderedTrait;

/**
 * Class History
 * @Transfer\RouteName("backend/community-lic")
 */
class CommunityLic extends AbstractQuery implements OrderedQueryInterface
{
    use OrderedTrait;

    /**
     * @var string
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @transfer\Optional
     */
    protected $statuses;

    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     * @transfer\Optional
     */
    protected $licence;

    /**
     * @return string
     */
    public function getStatuses()
    {
        return $this->statuses;
    }

    /**
     * @return int
     */
    public function getLicence()
    {
        return $this->licence;
    }
}
