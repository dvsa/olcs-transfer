<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Goods or PSV Optional
 */
trait GoodsOrPsvOptional
{
    /**
     * @var String
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator(
     *  {
     *      "name":"Zend\Validator\InArray",
     *      "options": {"haystack": {"lcat_gv","lcat_psv"}}
     *  }
     * )
     */
    protected $goodsOrPsv = null;

    /**
     * @return string
     */
    public function getGoodsOrPsv()
    {
        return $this->goodsOrPsv;
    }
}
