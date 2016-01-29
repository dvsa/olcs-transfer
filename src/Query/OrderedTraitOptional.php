<?php
namespace Dvsa\Olcs\Transfer\Query;

trait OrderedTraitOptional
{
    /**
     * The field to sort by - must not be empty.
     *
     * @var string
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\NotEmpty"})
     */
    protected $sort = 'id';

    /**
     * Can only be one of ASC or DESC in upper case.
     *
     * @var string
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Filter({"name":"Zend\Filter\StringToUpper"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\Order"})
     */
    protected $order = 'ASC';

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
