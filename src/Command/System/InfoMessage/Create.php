<?php

namespace Dvsa\Olcs\Transfer\Command\System\InfoMessage;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/system-info-message")
 * @Transfer\Method("POST")
 */
class Create extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     * @Transfer\Optional
     */
    public $isInternal;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options": {"max": 1024}})
     */
    protected $description;

    /**
     * @var string
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d H:i:s"}})
     */
    protected $startDate;

    /**
     * @var string
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d H:i:s"}})
     */
    protected $endDate;

    /**
     * @return boolean
     */
    public function isInternal()
    {
        return ($this->isInternal === 'Y');
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
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
