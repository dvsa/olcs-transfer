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
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength","options":{"min":1,"max":32}})
     */
    protected $categorys = [];

    /**
     * @return array
     */
    public function getCategorys()
    {
        return $this->categorys;
    }
}
