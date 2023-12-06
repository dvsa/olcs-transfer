<?php

/**
 * Create Other Licence for a Transport Manager Application
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */

namespace Dvsa\Olcs\Transfer\Command\OtherLicence;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/other-licence/tma")
 * @Transfer\Method("POST")
 */
final class CreateForTma extends AbstractCommand
{
    /**
     * @Transfer\Filter("Laminas\Filter\Digits")
     * @Transfer\Validator("Laminas\Validator\Digits")
     * @Transfer\Validator("Laminas\Validator\GreaterThan", options={"min": 0})
     */
    protected $tmaId;

    /**
     * @Transfer\Filter("Laminas\Filter\StringTrim")
     * @Transfer\Validator("Laminas\Validator\StringLength",options={"min":0,"max":18})
     */
    protected $licNo;

    /**
     * @Transfer\Filter("Laminas\Filter\StringTrim")
     * @Transfer\Validator("Laminas\Validator\InArray",
     *      options={"haystack": {"ol_role_applicant","ol_role_lic_holder","ol_role_tm"}}
     * )
     * @Transfer\Optional
     */
    protected $role;

    /**
     * @Transfer\Filter("Laminas\Filter\StringTrim")
     * @Transfer\Validator("Laminas\Validator\StringLength",options={"min":0,"max":255})
     */
    protected $operatingCentres;

    /**
     * @Transfer\Filter("Laminas\Filter\Digits")
     * @Transfer\Validator("Laminas\Validator\Digits")
     * @Transfer\Validator("Laminas\Validator\GreaterThan", options={"min": 0})
     * @Transfer\Optional
     */
    protected $totalAuthVehicles;

    /**
     * @Transfer\Validator("Laminas\I18n\Validator\IsFloat")
     * @Transfer\Validator("Laminas\Validator\GreaterThan", options={"min": 0})
     * @Transfer\Validator("Laminas\Validator\LessThan", options={"max": 99.9,"inclusive":true})
     */
    protected $hoursPerWeek;

    /**
     * Get the TMA ID
     *
     * @return int
     */
    public function getTmaId()
    {
        return $this->tmaId;
    }

    /**
     * Get the licence number (This is not a reference to a Licence entity)
     *
     * @return string
     */
    public function getLicNo()
    {
        return $this->licNo;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Get Operating Centres
     *
     * @return string
     */
    public function getOperatingCentres()
    {
        return $this->operatingCentres;
    }

    /**
     * Get Total Auth Vehicles
     *
     * @return int
     */
    public function getTotalAuthVehicles()
    {
        return $this->totalAuthVehicles;
    }

    /**
     * Get hours per week
     *
     * @return int
     */
    public function getHoursPerWeek()
    {
        return $this->hoursPerWeek;
    }
}
