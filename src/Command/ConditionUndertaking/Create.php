<?php

/**
 * Create ConditionUndertaking
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\ConditionUndertaking;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/condition-undertaking")
 * @Transfer\Method("POST")
 */
final class Create extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Between", "options": {"min": 0, "max": 999999}})
     * @Transfer\Optional
     */
    protected $licence;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Between", "options": {"min": 0, "max": 999999}})
     * @Transfer\Optional
     */
    protected $application;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Between", "options": {"min": 0, "max": 999999}})
     * @Transfer\Optional
     */
    protected $case;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"cdt_con", "cdt_und"}}})
     */
    protected $type;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength","options":{"min":5,"max":8000}})
     */
    protected $notes;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     */
    protected $fulfilled;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"cat_lic", "cat_oc"}}})
     */
    protected $attachedTo;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Between", "options": {"min": 0, "max": 999999}})
     * @Transfer\Optional
     */
    protected $operatingCentre;

    public function getLicence()
    {
        return $this->licence;
    }

    public function getApplication()
    {
        return $this->application;
    }

    public function getCase()
    {
        return $this->case;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getNotes()
    {
        return $this->notes;
    }

    public function getFulfilled()
    {
        return $this->fulfilled;
    }

    public function getAttachedTo()
    {
        return $this->attachedTo;
    }

    public function getOperatingCentre()
    {
        return $this->operatingCentre;
    }
}
