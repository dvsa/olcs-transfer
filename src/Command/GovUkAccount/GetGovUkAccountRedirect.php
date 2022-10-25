<?php

namespace Dvsa\Olcs\Transfer\Command\GovUkAccount;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/govuk-account/get-govuk-account-redirect")
 * @Transfer\Method("POST")
 */
class GetGovUkAccountRedirect extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength", "options":{"min":1}})
     */
    protected $returnUrl;

    public function getReturnUrl()
    {
        return $this->returnUrl;
    }
}
