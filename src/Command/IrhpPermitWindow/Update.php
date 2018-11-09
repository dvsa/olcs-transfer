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
    use IrhpPermitStock;

    /**
     * @var string
     * @Transfer\Filter({"name": "Zend\Filter\DateTimeFormatter"})
     * @Transfer\Validator({"name": "Date", "options": {"format": \DateTime::ISO8601}})
     */
    protected $startDate;

    /**
     * @var string
     * @Transfer\Filter({"name": "Zend\Filter\DateTimeFormatter"})
     * @Transfer\Validator({"name": "Date", "options": {"format": \DateTime::ISO8601}})
     */
    protected $endDate;

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

    /**
     * @return string
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @return string
     */
    public function getEndDate()
    {
        return $this->endDate;
    }
}
