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
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":255}})
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
