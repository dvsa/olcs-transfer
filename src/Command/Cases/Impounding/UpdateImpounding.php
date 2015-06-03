<?php

namespace Dvsa\Olcs\Transfer\Command\Cases\Impounding;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/impoundings")
 * @Transfer\Method("PUT")
 */
class UpdateImpounding extends AbstractCommand
{
    /**
     * @todo add validators
     */
    protected $id = null;

    /**
     * @todo add validators
     */
    protected $version = null;

    /**
     * @todo add validators
     */
    protected $impoundingType = null;

    /**
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $applicationReceiptDate = null;

    /**
     * @Transfer\Optional()
     */
    protected $vrm = null;

    /**
     * @todo add validators
     */
    protected $impoundingLegislationTypes = null;

    /**
     * @Transfer\Optional()
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
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
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
