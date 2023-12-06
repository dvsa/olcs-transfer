<?php

/**
 * Create IRFO GV Permit
 */

namespace Dvsa\Olcs\Transfer\Command\Irfo;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/irfo/gv-permit")
 * @Transfer\Method("POST")
 */
final class CreateIrfoGvPermit extends AbstractCommand
{
    /**
     * @Transfer\Filter("Laminas\Filter\Digits")
     * @Transfer\Validator("Laminas\Validator\Digits")
     * @Transfer\Validator("Laminas\Validator\GreaterThan", options={"min": 0})
     */
    protected $organisation;

    /**
     * @Transfer\Filter("Laminas\Filter\Digits")
     * @Transfer\Validator("Laminas\Validator\Digits")
     * @Transfer\Validator("Laminas\Validator\GreaterThan", options={"min": 0})
     */
    protected $irfoGvPermitType;

    /**
     * @Transfer\Filter("Laminas\Filter\Digits")
     * @Transfer\Validator("Laminas\Validator\Digits")
     * @Transfer\Validator("Laminas\Validator\GreaterThan", options={"min": 0})
     */
    protected $yearRequired;

    /**
     * @Transfer\Filter("Laminas\Filter\StringTrim")
     * @Transfer\Validator("Laminas\Validator\Date")
     */
    protected $inForceDate;

    /**
     * @Transfer\Filter("Laminas\Filter\StringTrim")
     * @Transfer\Validator("Laminas\Validator\Date")
     */
    protected $expiryDate;

    /**
     * @Transfer\Filter("Laminas\Filter\Digits")
     * @Transfer\Validator("Laminas\Validator\Digits")
     * @Transfer\Validator("Laminas\Validator\GreaterThan", options={"min": 0, "inclusive":true})
     */
    protected $noOfCopies;

    /**
     * @Transfer\Filter("Laminas\Filter\StringTrim")
     * @Transfer\Validator("Laminas\Validator\InArray", options={"haystack": {"Y", "N"}})
     * @Transfer\Optional
     */
    protected $isFeeExempt;

    /**
     * @Transfer\Filter("Laminas\Filter\StringTrim")
     * @Transfer\Validator("Laminas\Validator\StringLength",options={"max":255})
     * @Transfer\Optional
     */
    protected $exemptionDetails;

    /**
     * @return mixed
     */
    public function getOrganisation()
    {
        return $this->organisation;
    }

    /**
     * @return mixed
     */
    public function getIrfoGvPermitType()
    {
        return $this->irfoGvPermitType;
    }

    /**
     * @return mixed
     */
    public function getYearRequired()
    {
        return $this->yearRequired;
    }

    /**
     * @return mixed
     */
    public function getInForceDate()
    {
        return $this->inForceDate;
    }

    /**
     * @return mixed
     */
    public function getExpiryDate()
    {
        return $this->expiryDate;
    }

    /**
     * @return mixed
     */
    public function getNoOfCopies()
    {
        return $this->noOfCopies;
    }

    /**
     * @return mixed
     */
    public function getIsFeeExempt()
    {
        return $this->isFeeExempt;
    }

    /**
     * @return mixed
     */
    public function getExemptionDetails()
    {
        return $this->exemptionDetails;
    }

    /**
     * @param mixed $organisation
     */
    public function setOrganisation($organisation)
    {
        $this->organisation = $organisation;
    }

    /**
     * @param mixed $irfoGvPermitType
     */
    public function setIrfoGvPermitType($irfoGvPermitType)
    {
        $this->irfoGvPermitType = $irfoGvPermitType;
    }

    /**
     * @param mixed $yearRequired
     */
    public function setYearRequired($yearRequired)
    {
        $this->yearRequired = $yearRequired;
    }

    /**
     * @param mixed $inForceDate
     */
    public function setInForceDate($inForceDate)
    {
        $this->inForceDate = $inForceDate;
    }

    /**
     * @param mixed $noOfCopies
     */
    public function setNoOfCopies($noOfCopies)
    {
        $this->noOfCopies = $noOfCopies;
    }

    /**
     * @param mixed $isFeeExempt
     */
    public function setIsFeeExempt($isFeeExempt)
    {
        $this->isFeeExempt = $isFeeExempt;
    }

    /**
     * @param mixed $exemptionDetails
     */
    public function setExemptionDetails($exemptionDetails)
    {
        $this->exemptionDetails = $exemptionDetails;
    }
}
