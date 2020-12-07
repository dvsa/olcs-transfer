<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * IrhpPermitRangeTo
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Scott Callaway <scott.callaway@capgemini.com>
 */
trait IrhpPermitRangeTo
{
    /**
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     *
     * @var int
     */
    protected $toNo;

    /**
     * @return array
     */
    public function getToNo(): int
    {
        return $this->toNo;
    }
}
