<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait Irhp Permit Range Restricted Countries
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Scott Callaway <scott.callaway@capgemini.com>
 */
trait IrhpPermitRangeRestrictedCountries
{
    /**
     * @Transfer\ArrayInput
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\UniqueItems"})
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":2}})
     * @Transfer\Optional
     *
     * @var array
     */
    protected $countrys;

    /**
     * @return array
     */
    public function getRestrictedCountries()
    {
        return $this->countrys;
    }
}
