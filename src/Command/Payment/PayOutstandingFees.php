<?php

/**
 * Pay Outstanding Fees
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
namespace Dvsa\Olcs\Transfer\Command\Payment;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/payment/pay-outstanding-fees")
 * @Transfer\Method("POST")
 */
final class PayOutstandingFees extends AbstractCommand
{
    /**
     * @Transfer\ArrayInput
     */
    protected $feeIds;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $organisationId;

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
     * @todo validation
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
     * @todo validation
     */
    protected $chequeDate;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $poNo;

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
}
