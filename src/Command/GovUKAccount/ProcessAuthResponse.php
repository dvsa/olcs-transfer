<?php

namespace Dvsa\Olcs\Transfer\Command\GovUKAccount;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/govuk-account/process-auth-response")
 * @Transfer\Method("POST")
 */
class ProcessAuthResponse extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     */
    protected $code;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
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
