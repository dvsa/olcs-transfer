<?php

namespace Dvsa\Olcs\Transfer\Command\Cases\Si\Applied;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldType;

/**
 * @Transfer\RouteName("backend/si-penalty-applied/single")
 * @Transfer\Method("PUT")
 */
class Update extends AbstractCommand
{
    use FieldType\Identity;
    use FieldType\SiPenaltyType;
    use FieldType\StartDateOptional;
    use FieldType\EndDateOptional;

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
