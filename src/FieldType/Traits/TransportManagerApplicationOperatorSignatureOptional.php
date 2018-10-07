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
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\YesNo"})
     * @Transfer\Optional
     */
    protected $transportManagerApplicationOperatorSignature;

    /**
     * @return string
     */
    public function getTransportManagerApplicationOperatorSignature():string
    {
        return $this->transportManagerApplicationOperatorSignature;
    }

    /**
     * setTransportManagerApplicationOperatorSignature
     * @param $transportManagerApplicationOperatorSignature
     */
    public function setTransportManagerApplicationOperatorSignature($transportManagerApplicationOperatorSignature)
    {
        $this->transportManagerApplicationOperatorSignature = $transportManagerApplicationOperatorSignature;
    }
}