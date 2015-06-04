<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait LicenceOptional
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Valtech <uk@valtech.co.uk>
 */
trait LicenceOptional
{
    /**
     * @var int
     * @transfer\optional()
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $licence;

    /**
     * @return int
     */
    public function getLicence()
    {
        return $this->licence;
    }
}
