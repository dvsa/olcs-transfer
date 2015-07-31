<?php

namespace Dvsa\Olcs\Transfer\Command\Partial;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * Operator Contact Details partial
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
class OperatorContactDetails extends AbstractCommand
{
    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $id;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $version;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\EmailAddress"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min":5,"max":255}})
     * @Transfer\Optional
     */
    public $emailAddress;

    /**
     * @Transfer\Partial("Dvsa\Olcs\Transfer\Command\Partial\AddressOptional")
     * @Transfer\Optional
     */
    protected $address;

    /**
     * @Transfer\Partial("Dvsa\Olcs\Transfer\Command\Partial\PhoneContact")
     * @Transfer\Optional
     */
    protected $businessPhoneContact;

    /**
     * @Transfer\Partial("Dvsa\Olcs\Transfer\Command\Partial\PhoneContact")
     * @Transfer\Optional
     */
    protected $homePhoneContact;

    /**
     * @Transfer\Partial("Dvsa\Olcs\Transfer\Command\Partial\PhoneContact")
     * @Transfer\Optional
     */
    protected $mobilePhoneContact;

    /**
     * @Transfer\Partial("Dvsa\Olcs\Transfer\Command\Partial\PhoneContact")
     * @Transfer\Optional
     */
    protected $faxPhoneContact;

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Gets the value of version.
     *
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Gets the value of emailAddress.
     *
     * @return mixed
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * Gets the value of address.
     *
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Gets the value of businessPhoneContact.
     *
     * @return mixed
     */
    public function getBusinessPhoneContact()
    {
        return $this->businessPhoneContact;
    }

    /**
     * Gets the value of homePhoneContact.
     *
     * @return mixed
     */
    public function getHomePhoneContact()
    {
        return $this->homePhoneContact;
    }

    /**
     * Gets the value of mobilePhoneContact.
     *
     * @return mixed
     */
    public function getMobilePhoneContact()
    {
        return $this->mobilePhoneContact;
    }

    /**
     * Gets the value of faxPhoneContact.
     *
     * @return mixed
     */
    public function getFaxPhoneContact()
    {
        return $this->faxPhoneContact;
    }
}
