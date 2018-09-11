<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait EcmtPermitApplicationOptional
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 *
 */
trait EcmtPermitApplicationOptional
{
    /**
     * @var int
     * @Transfer\Optional
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
     * @param $ecmtPermitApplicationId
     * @return void
     */
    public function setEcmtPermitApplication($ecmtPermitApplicationId)
    {
        $this->ecmtPermitApplication = (int) $ecmtPermitApplicationId;
    }
}
