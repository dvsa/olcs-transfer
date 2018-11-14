<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait EcmtPermitApplication
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 *
 */
trait EcmtPermitApplication
{
    /**
     * @var int
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $ecmtPermitApplication;

    /**
     * Get ecmtPermitApplication
     *
     * @return int
     */
    public function getEcmtPermitApplication()
    {
        return $this->ecmtPermitApplication;
    }

    /**
     * Set ecmtPermitApplication
     *
     * @param integer $ecmtPermitApplicationId
     * @return void
     */
    public function setEcmtPermitApplication($ecmtPermitApplicationId)
    {
        $this->ecmtPermitApplication = (int) $ecmtPermitApplicationId;
    }
}
