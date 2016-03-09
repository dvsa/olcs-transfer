<?php

namespace Dvsa\Olcs\Transfer\Command\Cases\Si\Applied;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldType;

/**
 * @Transfer\RouteName("backend/si-penalty-applied")
 * @Transfer\Method("POST")
 */
class Create extends AbstractCommand
{
    use FieldType\SiPenaltyType;
    use FieldType\StartDateOptional;
    use FieldType\EndDateOptional;

    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $si;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\YesNo"})
     */
    protected $imposed;

    /**
     * @var String
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":500}})
     * @Transfer\Optional
     */
    protected $reasonNotImposed;

    /**
     * @return int
     */
    public function getSi()
    {
        return $this->si;
    }

    /**
     * @return string
     */
    public function getImposed()
    {
        return $this->imposed;
    }

    /**
     * @return string
     */
    public function getReasonNotImposed()
    {
        return $this->reasonNotImposed;
    }
}
