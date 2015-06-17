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
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
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
