<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

trait TrafficAreasOptionalWithOther
{
    /**
     * @Transfer\Optional
     * @Transfer\ArrayInput
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\UniqueItems"})
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({
     *      "name":"Laminas\Validator\InArray",
     *      "options": {
     *          "haystack": {"B","C","D","F","G","H","K","M","N","all","other"}}
     *      })
     */
    protected $trafficAreas = [];

    /**
     * @return array
     */
    public function getTrafficAreas()
    {
        return $this->trafficAreas;
    }
}
