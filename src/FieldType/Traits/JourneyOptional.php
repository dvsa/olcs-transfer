<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * JourneyOptional
 */
trait JourneyOptional
{
    /**
     * @Transfer\Optional
     * @Transfer\Filter("Laminas\Filter\StringTrim")
     * @Transfer\Validator("Laminas\Validator\InArray",options={"haystack":{"journey_single", "journey_multiple"}})
     */
    protected ?string $journey;

    public function getJourney(): ?string
    {
        return $this->journey;
    }
}
