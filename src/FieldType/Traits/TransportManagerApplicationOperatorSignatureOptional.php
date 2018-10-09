<?php


namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait TransportManagerApplicationOperatorSignatureOptional
 *
 * @package Dvsa\Olcs\Transfer\FieldType\Traits
 */
trait TransportManagerApplicationOperatorSignatureOptional
{
    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\YesNo"})
     */
    protected $transportManagerApplicationOperatorSignature;

    /**
     * @return string
     */
    public function getTransportManagerApplicationOperatorSignature()
    {
        return $this->transportManagerApplicationOperatorSignature;
    }


    /**
     * setTransportManagerApplicationOperatorSignature
     *
     * @param string $transportManagerApplicationOperatorSignature (Y|N operator signature)
     * @return void
     */
    public function setTransportManagerApplicationOperatorSignature(
        string $transportManagerApplicationOperatorSignature
    ) {
        $this->transportManagerApplicationOperatorSignature = $transportManagerApplicationOperatorSignature;
    }
}
