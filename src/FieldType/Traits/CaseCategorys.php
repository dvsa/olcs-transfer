<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Case Categorys
 */
trait CaseCategorys
{
    /**
     * @Transfer\ArrayInput
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\UniqueItems"})
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength","options":{"min":1,"max":32}})
     */
    protected $categorys = null;

    /**
     * @return int
     */
    public function getCategorys()
    {
        return $this->categorys;
    }
}
