<?php

namespace Dvsa\Olcs\Transfer\Command\Cases\Pi;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * Create PI SLA Exception Command
 *
 * @Transfer\RouteName("backend/pi/sla-exceptions")
 * @Transfer\Method("POST")
 */
class CreatePiSlaException extends AbstractCommand
{
    /**
     * Case ID
     *
     * @var int
     * @Transfer\Filter("Laminas\Filter\Digits")
     * @Transfer\Validator("Laminas\Validator\GreaterThan", options={"min": 0})
     */
    protected $case;

    /**
     * SLA Exception ID
     *
     * @var int
     * @Transfer\Filter("Laminas\Filter\Digits")
     * @Transfer\Validator("Laminas\Validator\GreaterThan", options={"min": 0})
     */
    protected $slaException;

    /**
     * Get Case ID
     *
     * @return int
     */
    public function getCase(): int
    {
        return $this->case;
    }

    /**
     * Get SLA Exception ID
     *
     * @return int
     */
    public function getSlaException(): int
    {
        return $this->slaException;
    }
}
