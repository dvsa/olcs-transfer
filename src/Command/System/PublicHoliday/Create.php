<?php

namespace Dvsa\Olcs\Transfer\Command\System\PublicHoliday;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/public-holiday")
 * @Transfer\Method("POST")
 */
class Create extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\YesNo"})
     * @Transfer\Optional
     */
    public $isEngland;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\YesNo"})
     * @Transfer\Optional
     */
    public $isWales;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\YesNo"})
     * @Transfer\Optional
     */
    public $isScotland;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\YesNo"})
     * @Transfer\Optional
     */
    public $isNi;

    /**
     * @var string
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $holidayDate;

    /**
     * @return string
     */
    public function getIsEngland()
    {
        return $this->isEngland;
    }

    /**
     * @return string
     */
    public function getIsWales()
    {
        return $this->isWales;
    }

    /**
     * @return string
     */
    public function getIsScotland()
    {
        return $this->isScotland;
    }

    /**
     * @return string
     */
    public function getIsIreland()
    {
        return $this->isNi;
    }

    /**
     * @return string
     */
    public function getHolidayDate()
    {
        return $this->holidayDate;
    }
}
