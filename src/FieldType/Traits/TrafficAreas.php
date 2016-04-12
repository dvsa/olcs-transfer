<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Traffic Areas
 */
trait TrafficAreas
{
    /**
     * @Transfer\ArrayInput
     * @Transfer\ArrayValidator({"name":"Zend\Validator\NotEmpty"})
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\UniqueItems"})
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *      "name":"Zend\Validator\InArray",
     *      "options": {
     *          "haystack": {"B","C","D","F","G","H","K","M","N"}}
     *      })
     */
    protected $trafficAreas;

    /**
     * @return array
     */
    public function getTrafficAreas()
    {
        return $this->trafficAreas;
    }
}
