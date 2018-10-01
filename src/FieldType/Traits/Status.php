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
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"ecmt_permit_awaiting", "ecmt_permit_cancelled", "ecmt_permit_issued", "ecmt_permit_nys", "ecmt_permit_uc", "ecmt_permit_unsuccessful", "ecmt_permit_withdrawn"}}})
     * @Transfer\Optional
     */
    public $status;

    public function getStatus()
    {
        return $this->status;
    }
}
