<?php

namespace Dvsa\Olcs\Transfer\Query\Publication;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedTrait;
use Dvsa\Olcs\Transfer\Query\OrderedTrait;

/**
 * @Transfer\RouteName("backend/publication/published-list")
 */
class PublishedList extends AbstractQuery implements PagedQueryInterface, OrderedQueryInterface
{
    use PagedTrait;
    use OrderedTrait;

    /**
     * @var string
     *
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Optional()
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"A&D", "N&P"}}})
     */
    protected $pubType;

    /**
     * @var integer
     *
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Between", "options": {"min": 1, "max": 12}})
     */
    protected $pubDateMonth;

    /**
     * @var integer
     *
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     */
    protected $pubDateYear;

    /**
     * @return string|null|fals-y
     */
    public function getPubType()
    {
        return $this->pubType;
    }

    /**
     * Get the value of pubDateMonth
     *
     * @return int
     */
    public function getPubDateMonth()
    {
        return $this->pubDateMonth;
    }

    /**
     * Get the value of pubDateYear
     *
     * @return int
     */
    public function getPubDateYear()
    {
        return $this->pubDateYear;
    }
}
