<?php

/**
 * Payment
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
namespace Dvsa\Olcs\Transfer\Query\Payment;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/payment/by-reference")
 */
class Payment extends AbstractQuery
{
    protected $reference;

    public function getReference()
    {
        return $this->reference;
    }
}
