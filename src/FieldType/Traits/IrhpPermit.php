<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * IRHP Permit
 *
 * @package Dvsa\Olcs\Transfer\FieldType\Traits
 */
trait IrhpPermit
{
    /**
     * @var int
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $irhpPermit;

    /**
     * @return int
     */
    public function getIrhpPermit(): int
    {
        return $this->irhpPermit;
    }
}
