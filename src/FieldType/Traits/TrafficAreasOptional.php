<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Traffic Areas
 */
trait TrafficAreasOptional
{
    /**
     * @Transfer\ArrayInput
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\UniqueItems"})
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *      "name":"Zend\Validator\InArray",
     *      "options": {
     *          "haystack": {"B","C","D","F","G","H","K","M","N","all"}}
     *      })
     */
    protected $trafficAreas = null;

    /**
     * @return array
     */
    public function getTrafficAreas()
    {
        return $this->trafficAreas;
    }
}