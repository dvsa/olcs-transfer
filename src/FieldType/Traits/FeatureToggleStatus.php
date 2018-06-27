<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * FeatureToggleStatus
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Ian Lindsay <ian@hemera-business-services.co.uk>
 */
trait FeatureToggleStatus
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min":1, "max":255}})
     */
    protected $status;

    public function getStatus(): string
    {
        return $this->status;
    }
}
