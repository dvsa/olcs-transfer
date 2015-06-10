<?php

namespace Dvsa\Olcs\Transfer\Command\Cases\Conviction;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

use Dvsa\Olcs\Transfer\FieldType as FieldType;

/**
 * @Transfer\RouteName("backend/conviction")
 * @Transfer\Method("POST")
 */
class Create extends AbstractCommand
    implements
    FieldType\CasesInterface
{
    use FieldType\Traits\Cases;
    use FieldType\Traits\DefendantType;
    use FieldType\Traits\TransportManagerOptional;
    use FieldType\Traits\ConvictionCategory;

    /**
     * @var string
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":70}})
     */
    protected $personFirstName;

    /**
     * @var string
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":70}})
     */
    protected $personLastName;

    /**
     * @Transfer\Optional
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $birthDate = null;

    /**
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $offenceDate = null;

    /**
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $convictionDate = null;

    /**
     * @var String
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *     "name":"Zend\Validator\InArray",
     *     "options": {
     *          "haystack": {
     *              "Yes",
     *              "No"
     *          }
     *      }
     * })
     */
    protected $msi;

    /**
     * @var string
     *
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":70}})
     */
    protected $court;

    /**
     * @var string
     *
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":255}})
     */
    protected $penalty;

    /**
     * @var string
     *
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":255}})
     */
    protected $costs;

    /**
     * @var string
     *
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":4000}})
     */
    protected $notes;

    /**
     * @var string
     *
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":4000}})
     */
    protected $takenIntoConsideration;

    /**
     * @var String
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *     "name":"Zend\Validator\InArray",
     *     "options": {
     *          "haystack": {
     *              "Yes",
     *              "No"
     *          }
     *      }
     * })
     */
    protected $isDeclared;

    /**
     * @var String
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *     "name":"Zend\Validator\InArray",
     *     "options": {
     *          "haystack": {
     *              "Yes",
     *              "No"
     *          }
     *      }
     * })
     */
    protected $isDealtWith;

    /**
     * @return string
     */
    public function getPersonFirstName()
    {
        return $this->personFirstName;
    }

    /**
     * @return string
     */
    public function getPersonLastName()
    {
        return $this->personLastName;
    }

    /**
     * @return string
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @return string
     */
    public function getOffenceDate()
    {
        return $this->offenceDate;
    }

    /**
     * @return string
     */
    public function getConvictionDate()
    {
        return $this->convictionDate;
    }

    /**
     * @return string
     */
    public function getMsi()
    {
        return $this->msi;
    }

    /**
     * @return mixed
     */
    public function getCourt()
    {
        return $this->court;
    }

    /**
     * @return mixed
     */
    public function getPenalty()
    {
        return $this->penalty;
    }

    /**
     * @return mixed
     */
    public function getCosts()
    {
        return $this->costs;
    }

    /**
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @return string
     */
    public function getTakenIntoConsideration()
    {
        return $this->takenIntoConsideration;
    }

    /**
     * @return String
     */
    public function getIsDeclared()
    {
        return $this->isDeclared;
    }

    /**
     * @return mixed
     */
    public function getIsDealtWith()
    {
        return $this->isDealtWith;
    }
}
