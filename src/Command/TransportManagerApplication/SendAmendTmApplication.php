<?php

namespace Dvsa\Olcs\Transfer\Command\TransportManagerApplication;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/transport-manager-application/single/send-amend-email")
 * @Transfer\Method("POST")
 */
class SendAmendTmApplication extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $id;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\EmailAddress"})
     */
    protected $emailAddress;

    /**
     * @return mixed
     */
    public function getEmailAddress()
        {
        return $this->emailAddress;
    }

    /**
     * Get tm application ID
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}