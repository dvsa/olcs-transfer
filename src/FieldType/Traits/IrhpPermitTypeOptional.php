<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * IRHP Permit Type Trait
 *
 * @package Dvsa\Olcs\Transfer\FieldType\Traits
 */
trait IrhpPermitTypeOptional
{
    /**
     * @var int
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *      "name":"Zend\Validator\Between",
     *      "options": {
     *          "min": 0,
     *          "max": 99999
     *      }
     * })
     */
    protected $irhpPermitType;

    /**
     * @return int
     */
    public function getIrhpPermitType()
    {
        return $this->irhpPermitType;
    }
}
