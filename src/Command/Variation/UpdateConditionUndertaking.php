<?php

/**
 * Update ConditionUndertaking
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Variation;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/variation/single/condition-undertaking/single")
 * @Transfer\Method("PUT")
 */
final class UpdateConditionUndertaking extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Between", "options": {"min": 0, "max": 999999}})
     */
    protected $id;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Between", "options": {"min": 0, "max": 999999}})
     */
    protected $conditionUndertaking;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Between", "options": {"min": 0, "max": 999999}})
     */
    protected $version;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"cdt_con", "cdt_und"}}})
     */
    protected $type;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
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

    public function getId()
    {
        return $this->id;
    }

    public function getConditionUndertaking()
    {
        return $this->conditionUndertaking;
    }

    public function getVersion()
    {
        return $this->version;
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
