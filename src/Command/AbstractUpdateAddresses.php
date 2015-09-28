<?php

/**
 * Update Addresses
 *
 * @author Nick Payne <nick.payne@valtech.co.uk>
 *
 * @TODO: apologies; there is some validation missing off this
 * command. Correspondence, contact, establishment and consultant
 * are all arrays of data which will need partials creating in order
 * to validate them.
 *
 * I'd sort this myself but won't have time before leaving. Consider
 * this my parting gift to one unfortunate developer of the future...
 */
namespace Dvsa\Olcs\Transfer\Command;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

abstract class AbstractUpdateAddresses extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $id;

    /**
     * @Transfer\Optional
     */
    protected $correspondence;

    /**
     * @Transfer\Optional
     */
    protected $contact;

    /**
     * @Transfer\Partial("Dvsa\Olcs\Transfer\Command\Partial\Address")
     * @Transfer\Optional
     */
    protected $correspondenceAddress;

    /**
     * @Transfer\Optional
     */
    protected $establishment;

    /**
     * @Transfer\Partial("Dvsa\Olcs\Transfer\Command\Partial\AddressOptional")
     * @Transfer\Optional
     */
    protected $establishmentAddress;

    /**
     * @Transfer\Optional
     */
    protected $consultant;

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
    public function getCorrespondence()
    {
        return $this->correspondence;
    }

    /**
     * @return mixed
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @return mixed
     */
    public function getCorrespondenceAddress()
    {
        return $this->correspondenceAddress;
    }

    /**
     * @return mixed
     */
    public function getEstablishment()
    {
        return $this->establishment;
    }

    /**
     * @return mixed
     */
    public function getEstablishmentAddress()
    {
        return $this->establishmentAddress;
    }

    /**
     * @return mixed
     */
    public function getConsultant()
    {
        return $this->consultant;
    }
}
