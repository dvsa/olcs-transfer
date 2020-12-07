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
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\InArray","options":{"haystack":{"journey_single", "journey_multiple"}}})
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
