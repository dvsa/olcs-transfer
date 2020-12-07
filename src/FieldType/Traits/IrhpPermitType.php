<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * IRHP Permit Type Trait
 *
 * @package Dvsa\Olcs\Transfer\FieldType\Traits
 * @author Scott Callaway <scott.callaway@capgemini.com>
 */
trait IrhpPermitType
{
    /**
     * @var string
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({
     *      "name":"Laminas\Validator\Between",
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
    public function getIrhpPermitType(): int
    {
        return $this->irhpPermitType;
    }
}
