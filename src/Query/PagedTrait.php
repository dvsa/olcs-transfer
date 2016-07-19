<?php

namespace Dvsa\Olcs\Transfer\Query;

trait PagedTrait
{
    /**
     * The page number that we're on. Integer.
     *
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $page;

    /**
     * The pagination limit. Integer.
     *
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {0, 10, 25, 50, 100}}})
     */
    protected $limit;

    /**
     * Return page
     *
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set Page
     *
     * @param int $page Page Number
     *
     * @return $this
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get count of records per page
     *
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Set count of records per page
     *
     * @param int $limit Count of records. possible valies 0, 10, 25, 50, 100
     *
     * @return $this
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;

        return $this;
    }
}
