<?php

namespace Dvsa\Olcs\Transfer\Command\ContactDetail\PhoneContact;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/contact-details/phone-contact")
 * @Transfer\Method("POST")
 */
class Create extends AbstractCommand
{
    /**
     * @var string
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *      "name":"Zend\Validator\InArray",
     *      "options": {
     *          "haystack": {
     *              "phone_t_tel", "phone_t_fax", "phone_t_home", "phone_t_mobile"
     *          }
     *     }
     * })
     */
    public $phoneContactType;

    /**
     * @var string
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options": {"max": 45}})
     */
    protected $phoneNumber;

    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $contactDetailsId;

    /**
     * Get Phone Contact Type
     *
     * @return string
     */
    public function getPhoneContactType()
    {
        return $this->phoneContactType;
    }

    /**
     * Get Phone Number
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Get Contact Details Id
     *
     * @return int
     */
    public function getContactDetailsId()
    {
        return $this->contactDetailsId;
    }
}
