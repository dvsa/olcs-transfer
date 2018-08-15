<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * EcmtPermitApplicationLicence
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Andy Newton <andrew.newton@capgemini.com>
 */
trait EcmtApplicationLicence
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Optional
     */
    public $licence;

    public function getLicence()
    {
        return $this->licence;
    }
}
