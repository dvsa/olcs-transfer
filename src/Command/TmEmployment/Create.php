<?php

/**
 * Create TmEmployment
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\TmEmployment;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/tm-employment")
 * @Transfer\Method("POST")
 */
final class Create extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $tmaId;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options": {"min": 0, "max": 45}})
     */
    protected $position;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options": {"min": 0, "max": 100}})
     */
    protected $hoursPerWeek;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options": {"min": 0, "max": 90}})
     */
    protected $employerName;

    /**
    * @Transfer\Partial("Dvsa\Olcs\Transfer\Command\Partial\Address")
    */
    protected $address;

    /**
     * Get Transport Manager Id
     *
     * @return int
     */
    public function getTmaId()
    {
        return $this->tmaId;
    }

    /**
     *
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     *
     * @return string
     */
    public function getHoursPerWeek()
    {
        return $this->hoursPerWeek;
    }

    /**
     *
     * @return string
     */
    public function getEmployerName()
    {
        return $this->employerName;
    }

    /**
     *
     * @return \Dvsa\Olcs\Transfer\Command\Partial\Address
     */
    public function getAddress()
    {
        return $this->address;
    }
}
