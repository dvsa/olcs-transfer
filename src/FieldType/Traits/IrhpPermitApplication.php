<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * IRHP Permit Application
 *
 * @package Dvsa\Olcs\Transfer\FieldType\Traits
 * @author Andy Newton <andy@vitri.ltd>
 */
trait IrhpPermitApplication
{
    /**
     * @var int
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $irhpPermitApplication;

    /**
     * @return int
     */
    public function getIrhpPermitApplication(): int
    {
        return $this->irhpPermitApplication;
    }
}
