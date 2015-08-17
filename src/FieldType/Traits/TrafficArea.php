<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Traffic Area
 */
trait TrafficArea
{
    /**
     * @var String
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *      "name":"Zend\Validator\InArray",
     *      "options": {
     *          "haystack": {"B","C","D","F","G","H","K","M","N"}}
     *      })
     */
    protected $trafficArea = null;

    /**
     * @return string
     */
    public function getTrafficArea()
    {
        return $this->trafficArea;
    }
}