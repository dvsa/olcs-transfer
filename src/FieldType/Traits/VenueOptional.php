<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait Venue
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Valtech <uk@valtech.co.uk>
 */
trait VenueOptional
{
    /**
     * @var int
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $venue;

    /**
     * @return int
     */
    public function getVenue()
    {
        return $this->venue;
    }
}
