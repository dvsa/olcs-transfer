<?php

/**
 * Remind Username Selfserve
 */
namespace Dvsa\Olcs\Transfer\Command\User;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/user/selfserve/remind-username")
 * @Transfer\Method("POST")
 */
final class RemindUsernameSelfserve extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min":2, "max":18}})
     */
    protected $licenceNumber;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\EmailAddress"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min":5,"max":60}})
     */
    public $emailAddress;

    public function getLicenceNumber()
    {
        return $this->licenceNumber;
    }

    /**
     * @return mixed
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }
}
