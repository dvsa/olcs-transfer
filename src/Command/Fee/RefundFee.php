<?php

/**
 * Refund Fee
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
namespace Dvsa\Olcs\Transfer\Command\Fee;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

use Dvsa\Olcs\Transfer\FieldType;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldTypeTraits;

/**
 * @Transfer\RouteName("backend/fee/single/refund-fee")
 * @Transfer\Method("PUT")
 */
final class RefundFee extends AbstractCommand implements FieldType\IdentityInterface
{
    use FieldTypeTraits\Identity;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $customerReference;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $customerName;

    /**
     * @Transfer\Partial("Dvsa\Olcs\Transfer\Command\Partial\AddressOptional")
     */
    protected $address;

    /**
     * Get customer reference
     *
     * @return string
     */
    public function getCustomerReference()
    {
        return $this->customerReference;
    }

    /**
     * Get customer name
     *
     * @return string
     */
    public function getCustomerName()
    {
        return $this->customerName;
    }

    /**
     * Get address
     *
     * @return array
     */
    public function getAddress()
    {
        return $this->address;
    }
}
