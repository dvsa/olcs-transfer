<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Publication Types
 */
trait PubTypesOptional
{
    /**
     * @Transfer\ArrayInput
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\UniqueItems"})
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *      "name":"Zend\Validator\InArray",
     *      "options": {
     *          "haystack": {"All","A&D","N&P"}}
     *      })
     */
    protected $pubTypes = null;

    /**
     * @return array
     */
    public function getPubTypes()
    {
        return $this->pubTypes;
    }
}