<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait Irhp Permit Range Is Reserve
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Scott Callaway <scott.callaway@capgemini.com>
 */
trait IrhpPermitRangeSsReserve
{
    /**
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": -1}})
     * @Transfer\Optional
     *
     * @var int
     */
    protected $ssReserve;

    /**
     * @return int
     */
    public function getSsReserve()
    {
        return $this->ssReserve;
    }
}
