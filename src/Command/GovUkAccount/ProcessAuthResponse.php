<?php

namespace Dvsa\Olcs\Transfer\Command\GovUkAccount;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/govuk-account/process-auth-response")
 * @Transfer\Method("POST")
 */
class ProcessAuthResponse extends AbstractCommand
{
    /**
     * @Transfer\Filter("Laminas\Filter\StringTrim")
     */
    protected $code;

    /**
     * @Transfer\Filter("Laminas\Filter\StringTrim")
     */
    protected $state;

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }
}
