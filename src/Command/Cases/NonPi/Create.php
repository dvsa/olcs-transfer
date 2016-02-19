<?php

namespace Dvsa\Olcs\Transfer\Command\Cases\NonPi;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

use Dvsa\Olcs\Transfer\FieldType as FieldType;

/**
 * @Transfer\RouteName("backend/non-pi")
 * @Transfer\Method("POST")
 */
class Create extends AbstractCommand implements FieldType\CasesInterface
{
    use FieldType\Traits\Cases;
    use FieldType\Traits\HearingType;
    use FieldType\Traits\VenueOptional;
    use FieldType\Traits\PresidingStaffNameOptional;

    /**
     * @Transfer\Optional
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $agreedByTcDate;

    /**
     * @Transfer\Optional
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d H:i:s"}})
     */
    protected $hearingDate;

    /**
     * @var string
     *
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":255}})
     */
    protected $venueOther;

    /**
     * @var int
     *
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Between","options":{"min":0,"max":99,"inclusive":true}})
     */
    protected $witnessCount;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *     "name":"Zend\Validator\InArray",
     *     "options": {
     *          "haystack": {
     *              "non_pio_nfa",
     *              "non_pio_other",
     *              "non_pio_ph",
     *              "non_pio_pi",
     *              "non_pio_und",
     *              "non_pio_wl"
     *          }
     *      }
     * })
     */
    protected $outcome;

    /**
     * @return mixed
     */
    public function getAgreedByTcDate()
    {
        return $this->agreedByTcDate;
    }

    /**
     * @return mixed
     */
    public function getHearingDate()
    {
        return $this->hearingDate;
    }

    /**
     * @return string
     */
    public function getVenueOther()
    {
        return $this->venueOther;
    }

    /**
     * @return int
     */
    public function getWitnessCount()
    {
        return $this->witnessCount;
    }

    /**
     * @return mixed
     */
    public function getOutcome()
    {
        return $this->outcome;
    }
}
