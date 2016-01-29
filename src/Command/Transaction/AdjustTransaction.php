<?php

/**
 * Adjust Transaction
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
namespace Dvsa\Olcs\Transfer\Command\Transaction;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

use Dvsa\Olcs\Transfer\FieldType;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldTypeTraits;

/**
 * @Transfer\RouteName("backend/transaction/single/adjust")
 * @Transfer\Method("PUT")
 */
final class AdjustTransaction extends AbstractCommand implements FieldType\IdentityInterface, FieldType\VersionInterface
{
    use FieldTypeTraits\Identity,
        FieldTypeTraits\Version;

    /**
     * Received amount
     */
    protected $received;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $payer;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $slipNo;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $chequeNo;

    /**
     * @Transfer\Optional
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $chequeDate;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $poNo;

    /**
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options": {"min": 1, "max": 1000}})
     * @Transfer\Filter({"name": "Zend\Filter\StringTrim"})
     */
    protected $reason;

    /**
     * Gets the Received amount.
     *
     * @return mixed
     */
    public function getReceived()
    {
        return $this->received;
    }

    /**
     * Gets the value of payer.
     *
     * @return mixed
     */
    public function getPayer()
    {
        return $this->payer;
    }

    /**
     * Gets the value of slipNo.
     *
     * @return mixed
     */
    public function getSlipNo()
    {
        return $this->slipNo;
    }

    /**
     * Gets the value of chequeNo.
     *
     * @return mixed
     */
    public function getChequeNo()
    {
        return $this->chequeNo;
    }

    /**
     * Gets the value of chequeDate.
     *
     * @return mixed
     */
    public function getChequeDate()
    {
        return $this->chequeDate;
    }

    /**
     * Gets the value of poNo.
     *
     * @return mixed
     */
    public function getPoNo()
    {
        return $this->poNo;
    }

    /**
     * Gets the value of reason.
     *
     * @return mixed
     */
    public function getReason()
    {
        return $this->reason;
    }
}
