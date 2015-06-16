<?php

namespace Dvsa\Olcs\Transfer\Command\Partial;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * Contact Details partial
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
class ContactDetails
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
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $fao;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\EmailAddress"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min":5,"max":255}})
     * @Transfer\Optional
     */
    public $emailAddress;

    /**
     * @Transfer\Partial("Dvsa\Olcs\Transfer\Command\Partial\Address")
     * @Transfer\Optional
     */
    protected $address;

    /**
     * @Transfer\ArrayInput
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\FilterEmptyItems"})
     * @Transfer\Partial("Dvsa\Olcs\Transfer\Command\Partial\PhoneContact")
     * @Transfer\Optional
     */
    protected $phoneContacts;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @return mixed
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return mixed
     */
    public function getPhoneContacts()
    {
        return $this->phoneContacts;
    }
}
