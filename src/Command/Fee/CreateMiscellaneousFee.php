<?php

/**
 * Create Miscellaneous Fee
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
namespace Dvsa\Olcs\Transfer\Command\Fee;

use Dvsa\Olcs\Api\Entity\Fee\Fee;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldTypeTraits;

/**
 * Create Miscellaneous Fee
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
final class CreateMiscellaneousFee extends AbstractCommand
    implements
    FieldType\UserInterface
{
    use FieldTypeTraits\User;

    protected $amount;

    protected $invoicedDate;

    protected $feeType;

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
}
