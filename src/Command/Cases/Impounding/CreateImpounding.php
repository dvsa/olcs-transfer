<?php

namespace Dvsa\Olcs\Transfer\Command\Cases\Impounding;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldType;

/**
 * @Transfer\RouteName("backend/impounding")
 * @Transfer\Method("POST")
 */
class CreateImpounding extends AbstractCommand
{
    use FieldType\Publish;

    /**
     * @var int
     * @Transfer\Filter("Laminas\Filter\Digits")
     * @Transfer\Validator("Laminas\Validator\Digits")
     * @Transfer\Validator("Laminas\Validator\GreaterThan", options={"min": 0})
     */
    protected $case = null;

    /**
     * @Transfer\Validator("Laminas\Validator\InArray", options={"haystack": {"impt_hearing","impt_paper"}})
     */
    protected $impoundingType = null;

    /**
     * @Transfer\Validator("Date", options={"format": "Y-m-d"})
     */
    protected $applicationReceiptDate = null;

    /**
     * @Transfer\Filter("Laminas\Filter\StringTrim")
     * @Transfer\Validator("Laminas\Validator\StringLength",options={"min":1,"max":20})
     */
    protected $vrm = null;

    /**
     * @Transfer\ArrayInput
     * @Transfer\Filter("Laminas\Filter\StringTrim")
     * @Transfer\Validator("Laminas\Validator\StringLength",options={"min":1,"max":32})
     */
    protected $impoundingLegislationTypes = [];

    /**
     * @Transfer\Optional()
     * @Transfer\Filter("Laminas\Filter\DateTimeFormatter")
     * @Transfer\Validator("Date", options={"format": \DateTime::ISO8601})
     */
    protected $hearingDate = null;

    /**
     * @Transfer\Optional()
     */
    protected $venue = null;

    /**
     * @Transfer\Optional()
     * @Transfer\Filter("Laminas\Filter\StringTrim")
     */
    protected $venueOther = null;

    /**
     * @Transfer\Optional()
     */
    protected $presidingTc = null;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator("Laminas\Validator\InArray", options={"haystack": {"impo_not","impo_returned","impo_wd"}})
     */
    protected $outcome = null;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator("Date", options={"format": "Y-m-d"})
     */
    protected $outcomeSentDate = null;

    /**
     * @Transfer\Optional()
     * @Transfer\Filter("Laminas\Filter\StringTrim")
     * @Transfer\Validator("Laminas\Validator\StringLength",options={"min":5,"max":4000})
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
        return $this;
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
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOutcomeSentDate()
    {
        return $this->outcomeSentDate;
    }

    /**
     * @param mixed $venue
     * @return $this
     */
    public function setVenue($venue)
    {
        $this->venue = $venue;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVenue()
    {
        return $this->venue;
    }

    /**
     * @param mixed $venueOther
     * @return $this
     */
    public function setVenueOther($venueOther)
    {
        $this->venueOther = $venueOther;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVenueOther()
    {
        return $this->venueOther;
    }

    /**
     * @param mixed $presidingTc
     * @return $this
     */
    public function setPresidingTc($presidingTc)
    {
        $this->presidingTc = $presidingTc;
        return $this;
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
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVrm()
    {
        return $this->vrm;
    }
}
