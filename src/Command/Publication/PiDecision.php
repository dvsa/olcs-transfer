<?php

/**
 * Publish Pi Decision
 */
namespace Dvsa\Olcs\Transfer\Command\Publication;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldType;

/**
 * @Transfer\RouteName("backend/publication/pi-decision")
 * @Transfer\Method("POST")
 */
final class PiDecision extends AbstractCommand
{
    use FieldType\Identity;
    use FieldType\TrafficAreasOptional;
    use FieldType\PubTypesOptional;

    /**
     * @var String
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":4000}})
     */
    protected $text2;

    /**
     * @return int
     */
    public function getText2()
    {
        return $this->text2;
    }
}
