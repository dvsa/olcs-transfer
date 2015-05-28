<?php

/**
 * Update Previous Conviction
 *
 * @author Nick Payne <nick.payne@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\PreviousConviction;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/previous-conviction/single")
 * @Transfer\Method("PUT")
 *
 * @TODO lots of validators missing here
 */
final class UpdatePreviousConviction extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $id;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $application;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $transportManager;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"title_dr","title_miss","title_mr","title_mrs","title_ms"}}})
     */
    protected $title;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $forename;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $familyName;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $convictionDate;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $courtFpn;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Optional
     */
    protected $categoryText;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $notes;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $penalty;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getApplication()
    {
        return $this->application;
    }

    public function getTransportManager()
    {
        return $this->transportManager;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getForename()
    {
        return $this->forename;
    }

    public function getFamilyName()
    {
        return $this->familyName;
    }

    public function getConvictionDate()
    {
        return $this->convictionDate;
    }

    public function getCourtFpn()
    {
        return $this->courtFpn;
    }

    public function getCategoryText()
    {
        return $this->categoryText;
    }

    public function getNotes()
    {
        return $this->notes;
    }

    public function getPenalty()
    {
        return $this->penalty;
    }
}
