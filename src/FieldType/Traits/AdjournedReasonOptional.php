<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait AdjournedReasonOptional
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Valtech <uk@valtech.co.uk>
 */
trait AdjournedReasonOptional
{
    /**
     * @var String
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":1000}})
     */
    protected $adjournedReason;

    /**
     * @return string
     */
    public function getAdjournedReason()
    {
        return $this->adjournedReason;
    }
}