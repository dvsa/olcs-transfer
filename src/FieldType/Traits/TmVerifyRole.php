<?php


namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait TmVerifyRole
 *
 * @package Dvsa\Olcs\Transfer\FieldType\Traits
 */
trait TmVerifyRole
{
    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\InArray","options":{'tma_sign_as_tm', 'tma_sign_as_op','tma_sign_as_top'})
     */
    protected $role;

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }


    /**
     * setTransportManagerApplicationOperatorSignature
     *
     * @param string $role (Y|N operator signature)
     *
     * @return void
     */
    public function setRole(
        string $role
    ) {
        $this->role = $role;
    }
}
