<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait Pi
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Valtech <uk@valtech.co.uk>
 */
trait PiVenueOptional
{
    /**
     * @var int|null
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $piVenue;

    /**
     * @return int
     */
    public function getPiVenue()
    {
        return $this->piVenue;
    }
}
