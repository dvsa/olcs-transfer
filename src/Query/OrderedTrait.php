<?php
namespace Dvsa\Olcs\Transfer\Query;

trait OrderedTrait
{
    /**
     * The field to sort by - must not be empty.
     *
     * @var string
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\NotEmpty"})
     */
    protected $sort;

    /**
     * Can only be one of ASC or DESC in upper case.
     *
     * @var string
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Filter({"name":"Zend\Filter\StringToUpper"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options":{"haystack": {"ASC": "DESC"}}})
     */
    protected $order;

    /**
     * @return string
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param string $sort
     */
    public function setSort($sort)
    {
        $this->sort = $sort;
    }

    /**
     * @return string
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param string $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }
}