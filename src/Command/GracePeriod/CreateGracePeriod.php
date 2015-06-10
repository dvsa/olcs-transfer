<?php

/**
 * CreateGracePeriod.php
 *
 * @author Josh Curtis <josh.curtis@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\GracePeriod;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/grace-periods")
 * @Transfer\Method("POST")
 */
final class CreateGracePeriod extends AbstractCommand
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $licence;

    /**
     * @var string
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $startDate;

    /**
     * @var string
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $endDate;

    /**
     * @var string
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $description;

    /**
     * @return mixed
     */
    public function getLicence()
    {
        return $this->licence;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }
}
