<?php

/**
 * Register User Selfserve
 */
namespace Dvsa\Olcs\Transfer\Command\User;

use Dvsa\Olcs\Transfer\FieldType\Traits\TranslateToWelshOptional;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/user/selfserve/register")
 * @Transfer\Method("POST")
 */
final class RegisterUserSelfserve extends AbstractCommand
{
    use TranslateToWelshOptional;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\Username"})
     */
    protected $loginId;

    /**
         * @Transfer\Partial("Dvsa\Olcs\Transfer\Command\Partial\ContactDetails")
     */
    protected $contactDetails;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength", "options":{"min":2, "max":18}})
     * @Transfer\Optional
     */
    protected $licenceNumber = null;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength", "options":{"min":2, "max":160}})
     * @Transfer\Optional
     */
    protected $organisationName = null;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({
     *     "name":"Laminas\Validator\InArray",
     *     "options": {"haystack": {"org_t_p","org_t_pa","org_t_rc","org_t_llp","org_t_st"}}
     * })
     * @Transfer\Optional
     */
    protected $businessType;

    public function getLoginId()
    {
        return $this->loginId;
    }

    public function getContactDetails()
    {
        return $this->contactDetails;
    }

    public function getLicenceNumber()
    {
        return $this->licenceNumber;
    }

    public function getOrganisationName()
    {
        return $this->organisationName;
    }

    public function getBusinessType()
    {
        return $this->businessType;
    }
}
