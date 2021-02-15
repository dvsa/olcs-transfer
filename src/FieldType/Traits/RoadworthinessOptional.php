<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Roadworthiness Optional
 */
trait RoadworthinessOptional
{
    /**
     * @var int
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Between", "options": {"min": 0, "max": 1}})
     */
    protected $roadworthiness;

    /**
     * @return int
     */
    public function getRoadworthiness()
    {
        return $this->roadworthiness;
    }
}
