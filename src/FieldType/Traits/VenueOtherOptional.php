<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait Venue Other Optional
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Valtech <uk@valtech.co.uk>
 */
trait VenueOtherOptional
{
    /**
     * @var String
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength", "options":{"max":255}})
     */
    protected $venueOther;

    /**
     * @return string
     */
    public function getVenueOther()
    {
        return $this->venueOther;
    }
}
