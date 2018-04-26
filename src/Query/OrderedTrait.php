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
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\Sort"})
     */
    protected $sort;

    /**
     * Can only be one of ASC or DESC in upper case.
     *
     * @var string
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Filter({"name":"Zend\Filter\StringToUpper"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\Order"})
     */
    protected $order;

    /**
     * Set this property in you constructor to only enable specified values for $sort property
     *
     * @var array
     * @Transfer\DoNotExchange
     * @Transfer\Optional
     */
    protected $sortWhitelist = [];

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

    /**
     * @return bool
     */
    public function isSortWhitelisted() {

        if (empty($this->sortWhitelist)) {
            return true;
        }

        if (!in_array($this->sort, $this->sortWhitelist)) {
            return false;
        }

        return true;
    }
}
