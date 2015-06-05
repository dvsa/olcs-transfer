<?php

namespace Dvsa\Olcs\Transfer\Command\Cases\Impounding;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/impounding")
 * @Transfer\Method("POST")
 */
class CreateImpounding extends AbstractCommand
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $case = null;

    /**
     * @Transfer\Validator(
     *  {
     *      "name":"Zend\Validator\InArray",
     *      "options": {"haystack": {"impt_hearing","impt_paper"}}
     *  }
     * )
     */
    protected $impoundingType = null;

    /**
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $applicationReceiptDate = null;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"\Dvsa\Olcs\Transfer\Filter\Vrm"})
     * @Transfer\Validator({"name":"\Dvsa\Olcs\Transfer\Validators\Vrm"})
     */
    protected $vrm = null;

    /**
     * @todo add validators
     */
    protected $impoundingLegislationTypes = null;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $hearingDate = null;

    /**
     * @Transfer\Optional()
     */
    protected $piVenue = null;

    /**
     * @Transfer\Optional() 
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $piVenueOther = null;

    /**
     * @Transfer\Optional() 
     */
    protected $presidingTc = null;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator(
     *  {
     *      "name":"Zend\Validator\InArray",
     *      "options": {"haystack": {"impo_not","impo_returned","impo_wd"}}
     *  }
     * )
     */
    protected $outcome = null;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $outcomeSentDate = null;

    /**
     * @Transfer\Optional()
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength","options":{"min":5,"max":4000}})
     */
    protected $notes = null;

    /**
     * @param mixed $case
     * @return $this
     */
    public function setCase($case)
    {
        $this->case = $case;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCase()
    {
        return $this->case;
    }

    /**
     * @param mixed $applicationReceiptDate
     * @return $this
     */
    public function setApplicationReceiptDate($applicationReceiptDate)
    {
        $this->applicationReceiptDate = $applicationReceiptDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getApplicationReceiptDate()
    {
        return $this->applicationReceiptDate;
    }

    /**
     * @param mixed $hearingDate
     * @return $this
     */
    public function setHearingDate($hearingDate)
    {
        $this->hearingDate = $hearingDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHearingDate()
    {
        return $this->hearingDate;
    }

    /**
     * @param mixed $impoundingLegislationTypes
     * @return $this
     */
    public function setImpoundingLegislationTypes($impoundingLegislationTypes)
    {
        $this->impoundingLegislationTypes = $impoundingLegislationTypes;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImpoundingLegislationTypes()
    {
        return $this->impoundingLegislationTypes;
    }

    /**
     * @param mixed $impoundingType
     * @return $this
     */
    public function setImpoundingType($impoundingType)
    {
        $this->impoundingType = $impoundingType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImpoundingType()
    {
        return $this->impoundingType;
    }

    /**
     * @param mixed $notes
     * @return $this
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param mixed $outcome
     * @return $this
     */
    public function setOutcome($outcome)
    {
        $this->outcome = $outcome;
    }

    /**
     * @return mixed
     */
    public function getOutcome()
    {
        return $this->outcome;
    }

    /**
     * @param mixed $outcomeSentDate
     * @return $this
     */
    public function setOutcomeSentDate($outcomeSentDate)
    {
        $this->outcomeSentDate = $outcomeSentDate;
    }

    /**
     * @return mixed
     */
    public function getOutcomeSentDate()
    {
        return $this->outcomeSentDate;
    }

    /**
     * @param mixed $piVenue
     * @return $this
     */
    public function setPiVenue($piVenue)
    {
        $this->piVenue = $piVenue;
    }

    /**
     * @return mixed
     */
    public function getPiVenue()
    {
        return $this->piVenue;
    }

    /**
     * @param mixed $piVenueOther
     * @return $this
     */
    public function setPiVenueOther($piVenueOther)
    {
        $this->piVenueOther = $piVenueOther;
    }

    /**
     * @return mixed
     */
    public function getPiVenueOther()
    {
        return $this->piVenueOther;
    }

    /**
     * @param mixed $presidingTc
     * @return $this
     */
    public function setPresidingTc($presidingTc)
    {
        $this->presidingTc = $presidingTc;
    }

    /**
     * @return mixed
     */
    public function getPresidingTc()
    {
        return $this->presidingTc;
    }

    /**
     * @param mixed $vrm
     * @return $this
     */
    public function setVrm($vrm)
    {
        $this->vrm = $vrm;
    }

    /**
     * @return mixed
     */
    public function getVrm()
    {
        return $this->vrm;
    }
}
