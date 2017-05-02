<?php

/**
 * UpdatePeople
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Licence;

use Dvsa\Olcs\Transfer\FieldType\Traits;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/licence/single/people/person")
 * @Transfer\Method("PUT")
 */
final class UpdatePeople extends AbstractCommand
{
    use Traits\Identity,
        Traits\Version;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $person;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength","options":{"min":0,"max":35}})
     */
    protected $forename;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *     "name":"Zend\Validator\InArray",
     *     "options": {
     *          "haystack": {"title_dr","title_miss","title_mr","title_mrs","title_ms"},
     *     }
     * })
     * @Transfer\Optional
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
     * @Transfer\Optional
     */
    protected $birthDate;

    public function getPerson()
    {
        return $this->person;
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
