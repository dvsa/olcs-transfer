<?php

/**
 * Create User
 */
namespace Dvsa\Olcs\Transfer\Command\User;

use Dvsa\Olcs\Transfer\FieldType\Traits\TranslateToWelshOptional;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/user/internal")
 * @Transfer\Method("POST")
 */
final class CreateUser extends AbstractCommand
{
    use TranslateToWelshOptional;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\Username"})
     */
    protected $loginId;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({
     *     "name":"Laminas\Validator\InArray",
     *     "options": {
     *         "haystack": {"internal","local-authority","partner","operator","transport-manager"}
     *     }
     * })
     */
    protected $userType;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $team = null;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $application = null;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $transportManager = null;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $localAuthority = null;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $partnerContactDetails = null;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength", "options":{"min":2, "max":18}})
     * @Transfer\Optional
     */
    protected $licenceNumber = null;

    /**
     * @Transfer\ArrayInput
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({
     *     "name":"Laminas\Validator\InArray",
     *     "options": {
     *         "haystack": {
     *             "system-admin",
     *             "internal-limited-read-only",
     *             "internal-read-only",
     *             "internal-case-worker",
     *             "internal-admin",
     *             "operator-admin",
     *             "operator-user",
     *             "operator-tm",
     *             "partner-admin",
     *             "partner-user",
     *             "local-authority-admin",
     *             "local-authority-user"
     *         }
     *     }
     * })
     */
    protected $roles = [];

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({
     *     "name":"Laminas\Validator\InArray",
     *     "options": {
     *          "haystack": {
     *              "windows_7", "windows_10", "northern_i"
     *          }
     *     }
     * })
     * @Transfer\Optional
     */
    protected $osType = null;

    /**
     * @Transfer\Partial("Dvsa\Olcs\Transfer\Command\Partial\ContactDetails")
     */
    protected $contactDetails;

    public function getUserType()
    {
        return $this->userType;
    }

    public function getTeam()
    {
        return $this->team;
    }

    public function getApplication()
    {
        return $this->application;
    }

    public function getTransportManager()
    {
        return $this->transportManager;
    }

    public function getLocalAuthority()
    {
        return $this->localAuthority;
    }

    public function getPartnerContactDetails()
    {
        return $this->partnerContactDetails;
    }

    public function getLicenceNumber()
    {
        return $this->licenceNumber;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function getContactDetails()
    {
        return $this->contactDetails;
    }

    public function getLoginId()
    {
        return $this->loginId;
    }

    /**
     * @return string
     */
    public function getOsType(): ?string
    {
        return $this->osType;
    }

    /**
     * @param string $osType
     */
    public function setOsType(?string $osType): void
    {
        $this->osType = $osType;
    }
}
