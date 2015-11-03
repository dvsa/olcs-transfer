<?php

/**
 * Reverse Transaction
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
namespace Dvsa\Olcs\Transfer\Command\Transaction;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

use Dvsa\Olcs\Transfer\FieldType;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldTypeTraits;

/**
 * @Transfer\RouteName("backend/transaction/single/reverse")
 * @Transfer\Method("PUT")
 */
final class ReverseTransaction extends AbstractCommand implements FieldType\IdentityInterface
{
    use FieldTypeTraits\Identity;
}
