<?php

/**
 * Update IRHP Permit Window
 */
namespace Dvsa\Olcs\Transfer\Command\IrhpPermitWindow;

use Dvsa\Olcs\Transfer\FieldType\Traits\EndDate;
use Dvsa\Olcs\Transfer\FieldType\Traits\IrhpPermitStock;
use Dvsa\Olcs\Transfer\FieldType\Traits\StartDate;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;

/**
 * @Transfer\RouteName("backend/irhp-permit-window/single")
 * @Transfer\Method("PUT")
 */
final class Update extends AbstractCommand
{
    use Identity;
    use StartDate;
    use EndDate;
    use IrhpPermitStock;

    /**
     * @var int
     * @Transfer\Optional
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $daysForPayment;

    /**
     * @return int
     */
    public function getDaysForPayment(): int
    {
        return $this->daysForPayment;
    }
}
