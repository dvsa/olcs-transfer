<?php

/**
 * Refuse Bus Reg By Short Notice
 */
namespace Dvsa\Olcs\Transfer\Command\Bus;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldType;

/**
 * @Transfer\RouteName("backend/bus/single/decision/refuse-by-short-notice")
 * @Transfer\Method("PUT")
 */
final class RefuseBusRegByShortNotice extends AbstractCommand
{
    use FieldType\Identity;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":255}})
     */
    public $reason;

    /**
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }
}