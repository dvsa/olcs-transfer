<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * JourneyOptional
 */
trait JourneyOptional
{
    /**
     * @var String
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray","options":{"haystack":{"journey_single", "journey_multiple"}}})
     */
    protected $journey;

    /**
     * @return string
     */
    public function getJourney()
    {
        return $this->journey;
    }
}
