<?php

/**
 * Addresses
 *
 * @author Nick Payne <nick.payne@valtech.co.uk>
 *
 * @FIXME: validators required!
 */
namespace Dvsa\Olcs\Transfer\Command\Licence;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/licence/single/addresses")
 * @Transfer\Method("PUT")
 */
final class UpdateAddresses extends AbstractCommand
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
     * @Transfer\Partial("Dvsa\Olcs\Transfer\Command\Partial\Address")
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
