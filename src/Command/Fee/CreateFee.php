<?php

/**
 * Create Fee
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
namespace Dvsa\Olcs\Transfer\Command\Fee;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldTypeTraits;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/fee")
 * @Transfer\Method("POST")
 */
class CreateFee extends AbstractCommand implements
    FieldType\ApplicationInterface,
    FieldType\BusRegInterface,
    FieldType\LicenceInterface,
    FieldType\TaskInterface,
    FieldType\IrfoGvPermitInterface,
    FieldType\IrfoPsvAuthInterface
{
    use FieldTypeTraits\ApplicationOptional,
        FieldTypeTraits\BusRegOptional,
        FieldTypeTraits\LicenceOptional,
        FieldTypeTraits\EcmtPermitApplicationOptional,
        FieldTypeTraits\IrhpApplicationOptional,
        FieldTypeTraits\TaskOptional,
        FieldTypeTraits\IrfoGvPermitOptional,
        FieldTypeTraits\IrfoPsvAuthOptional;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\Money"})
     */
    protected $amount;

    /**
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $invoicedDate;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $feeType;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $description;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *  "name":"Zend\Validator\InArray",
     *  "options": {"haystack": {"lfs_ot","lfs_pd","lfs_cn"}}
     * })
     */
    protected $feeStatus = 'lfs_ot';

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 1,"inclusive": true}})
     */
    protected $quantity;

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return mixed
     */
    public function getInvoicedDate()
    {
        return $this->invoicedDate;
    }

    /**
     * @return mixed
     */
    public function getFeeType()
    {
        return $this->feeType;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getFeeStatus()
    {
        return $this->feeStatus;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }
}
