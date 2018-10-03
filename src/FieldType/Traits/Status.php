<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Status
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Tonci Vidovic <tonci.vidovic@capgemini.com>
 */
trait Status
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min":1, "max":32}})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"permit_app_awaiting", "permit_app_cancelled", "permit_app_issued", "permit_app_nys", "permit_app_uc", "permit_app_unsuccessful", "permit_app_withdrawn", "permit_app_issuing", "permit_app_declined", "permit_app_valid"}}})
     * @Transfer\Optional
     */
    public $status;

    public function getStatus()
    {
        return $this->status;
    }
}
