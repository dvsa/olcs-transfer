<?php

/**
 * CreatePeople
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Licence;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/licence/single/people")
 * @Transfer\Method("POST")
 */
final class CreatePeople extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $id;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength","options":{"min":0,"max":35}})
     */
    protected $forename;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"title_dr","title_miss","title_mr","title_mrs","title_ms"}}})
     */
    protected $title;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength","options":{"min":0,"max":35}})
     */
    protected $familyName;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength","options":{"min":0,"max":35}})
     * @Transfer\Optional
     */
    protected $otherName;

    /**
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $birthDate;

    public function getId()
    {
        return $this->id;
    }

    public function getForename()
    {
        return $this->forename;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getFamilyName()
    {
        return $this->familyName;
    }

    public function getOtherName()
    {
        return $this->otherName;
    }

    public function getBirthDate()
    {
        return $this->birthDate;
    }
}
