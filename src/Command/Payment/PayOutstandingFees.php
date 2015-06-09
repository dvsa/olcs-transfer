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
     * @var array
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
     *  "options": {"haystack": {"fpm_card_offline", "fpm_card_online"}}
     * })
     */
    protected $paymentMethod;

    /**
     * @return array
     */
    public function getFeeIds()
    {
        return $this->feeIds;
    }

    /**
     * @return mixed
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
}
