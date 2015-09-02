<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait Pi
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Valtech <uk@valtech.co.uk>
 */
trait PiVenueOtherOptional
{
    /**
     * @var String
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":255}})
     */
    protected $piVenueOther;

    /**
     * @return string
     */
    public function getPiVenueOther()
    {
        return $this->piVenueOther;
    }
}
