<?php

namespace Dvsa\Olcs\Transfer\Command\Cases\NonPi;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

use Dvsa\Olcs\Transfer\FieldType as FieldType;

/**
 * @Transfer\RouteName("backend/non-pi")
 * @Transfer\Method("POST")
 */
class Create extends AbstractCommand
    implements
    FieldType\CasesInterface
{
    use FieldType\Traits\Cases;
    use FieldType\Traits\NonPiType;
    use FieldType\Traits\VenueOptional;
    use FieldType\Traits\PresidingTCOptional;

    /**
     * @Transfer\Optional
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d H:i"}})
     */
    protected $agreedByTcDate;

    /**
     * @Transfer\Optional
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d H:i"}})
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
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":2}})
     */
    protected $witnessCount;

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
}
