<?php

/**
 * Replace IRHP Permit
 *
 * @author Andy Newton <andy@vitri.ltd>
 */
namespace Dvsa\Olcs\Transfer\Command\IrhpPermit;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\FieldType\Traits\ReplacementIrhpPermit;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/irhp-permits/single/replace")
 * @Transfer\Method("POST")
 */
final class Replace extends AbstractCommand
{
    use Identity;

    /**
     * @var String
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":100}})
     */
    protected $replacementIrhpPermit;

    /**
     * @return int
     */
    public function getReplacementIrhpPermit(): string
    {
        return $this->replacementIrhpPermit;
    }
}
