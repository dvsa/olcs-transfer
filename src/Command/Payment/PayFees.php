<?php

/**
 * Pay Fees
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
namespace Dvsa\Olcs\Transfer\Command\Payment;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/payment/pay-fees")
 * @Transfer\Method("POST")
 */
final class PayFees extends AbstractCommand
{
    /**
     * @var array
     */
    protected $feeIds;

    /**
     * @return mixed
     */
    public function getFeeIds()
    {
        return $this->feeIds;
    }
}
