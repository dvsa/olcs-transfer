<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Is Ni Optional
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Valtech <uk@valtech.co.uk>
 */
trait IsNiOptional
{
    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\YesNo"})
     */
    protected $isNi;

    /**
     * @return string
     */
    public function getIsNi()
    {
        return $this->isNi;
    }
}
