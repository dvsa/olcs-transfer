<?php

/**
 * Send Transport Manager Application Email
 *
 * @author Alex Peshkov <alex.peshkov@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\TransportManagerApplication;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/transport-manager-application/single/send-email")
 * @Transfer\Method("POST")
 */
final class SendTmApplication extends AbstractCommand
{
    /**
     * @Transfer\Filter("Laminas\Filter\Digits")
     * @Transfer\Validator("Laminas\Validator\Digits")
     * @Transfer\Validator("Laminas\Validator\GreaterThan", options={"min": 0})
     */
    protected $id;

    /**
     * @Transfer\Filter("Laminas\Filter\StringTrim")
     * @Transfer\Validator("Dvsa\Olcs\Transfer\Validators\EmailAddress")
     */
    protected $emailAddress;

    /**
     * @return string
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
