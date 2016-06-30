<?php

/**
 * Pay Outstanding Fees
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
namespace Dvsa\Olcs\Transfer\Command\Transaction;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/transaction/pay-outstanding-fees")
 * @Transfer\Method("POST")
 */
final class PayOutstandingFees extends AbstractCommand
{
    /**
     * @Transfer\ArrayInput
     */
    protected $feeIds = [];

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $organisationId;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $applicationId;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $cpmsRedirectUrl;

    /**
     * @Transfer\Validator({
     *  "name":"Zend\Validator\InArray",
     *  "options": {
     *      "haystack": {
     *          "fpm_card_offline",
     *          "fpm_card_online",
     *          "fpm_cash",
     *          "fpm_cheque",
     *          "fpm_po",
     *      }
     *  }
     * })
     */
    protected $paymentMethod;

    /**
     * Received amount
     * @Transfer\Optional
     */
    protected $received;

    /**
     * @Transfer\Optional
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $receiptDate;

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
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $storedCardReference;

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
     * Get fee ids
     *
     * @return array
     */
    public function getFeeIds()
    {
        return $this->feeIds;
    }

    /**
     * Get organisation id
     *
     * @return int
     */
    public function getOrganisationId()
    {
        return $this->organisationId;
    }

    /**
     * Get application id
     *
     * @return int
     */
    public function getApplicationId()
    {
        return $this->applicationId;
    }

    /**
     * Get cmps redirect url
     *
     * @return string
     */
    public function getCpmsRedirectUrl()
    {
        return $this->cpmsRedirectUrl;
    }

    /**
     * Get payment method
     *
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * Get received
     *
     * @return string
     */
    public function getReceived()
    {
        return $this->received;
    }

    /**
     * Get receipt date
     *
     * @return \DateTime
     */
    public function getReceiptDate()
    {
        return $this->receiptDate;
    }

    /**
     * Get payer
     *
     * @return string
     */
    public function getPayer()
    {
        return $this->payer;
    }

    /**
     * Get slip no
     *
     * @return string
     */
    public function getSlipNo()
    {
        return $this->slipNo;
    }

    /**
     * Get cheque no
     *
     * @return string
     */
    public function getChequeNo()
    {
        return $this->chequeNo;
    }

    /**
     * Get cheque date
     *
     * @return \DateTime
     */
    public function getChequeDate()
    {
        return $this->chequeDate;
    }

    /**
     * Get po no
     *
     * @return string
     */
    public function getPoNo()
    {
        return $this->poNo;
    }

    /**
     * Get stored card reference
     *
     * @return string
     */
    public function getStoredCardReference()
    {
        return $this->storedCardReference;
    }

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
