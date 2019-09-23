<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Business Process Optional
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Andy Newton <andy@vitri.ltd>
 */
trait BusinessProcessOptional
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min":1, "max":32}})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"app_business_process_apg", "app_business_process_apgg", "app_business_process_apsg"}}})
     * @Transfer\Optional
     */
    public $businessProcess;

    public function getBusinessProcess()
    {
        return $this->businessProcess;
    }
}
