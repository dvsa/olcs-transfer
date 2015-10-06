<?php

/**
 * Create User Selfserve
 */
namespace Dvsa\Olcs\Transfer\Command\User;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/user/selfserve")
 * @Transfer\Method("POST")
 */
final class CreateUserSelfserve extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min":2, "max":40}})
     */
    protected $loginId;

    /**
     * @Transfer\Partial("Dvsa\Olcs\Transfer\Command\Partial\ContactDetails")
     */
    protected $contactDetails;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"admin", "user"}}})
     */
    protected $permission;

    public function getLoginId()
    {
        return $this->loginId;
    }

    public function getContactDetails()
    {
        return $this->contactDetails;
    }

    public function getPermission()
    {
        return $this->permission;
    }
}
