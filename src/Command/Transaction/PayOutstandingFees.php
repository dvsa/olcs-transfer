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
     * @return array
     */
    public function getFeeIds()
    {
        return $this->feeIds;
    }

    /**
     * @return int
     */
    public function getOrganisationId()
    {
        return $this->organisationId;
    }

    /**
     * @return int
     */
    public function getApplicationId()
    {
        return $this->applicationId;
    }

    /**
     * @return string
     */
    public function getCpmsRedirectUrl()
    {
        return $this->cpmsRedirectUrl;
    }

    /**
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @return string
     */
    public function getReceived()
    {
        return $this->received;
    }

    /**
     * @return \DateTime
     */
    public function getReceiptDate()
    {
        return $this->receiptDate;
    }

    /**
     * @return string
     */
    public function getPayer()
    {
        return $this->payer;
    }

    /**
     * @return string
     */
    public function getSlipNo()
    {
        return $this->slipNo;
    }

    /**
     * @return string
     */
    public function getChequeNo()
    {
        return $this->chequeNo;
    }

    /**
     * @return \DateTime
     */
    public function getChequeDate()
    {
        return $this->chequeDate;
    }

    /**
     * @return string
     */
    public function getPoNo()
    {
        return $this->poNo;
    }

    /**
     * @return string
     */
    public function getStoredCardReference()
    {
        return $this->storedCardReference;
    }
}
