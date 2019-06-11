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
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Between", "options": {"min": 0, "max": 1}})
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
