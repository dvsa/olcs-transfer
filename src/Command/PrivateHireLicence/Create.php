<?php

/**
 * Create PrivateHireLicence
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\PrivateHireLicence;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/private-hire-licence")
 * @Transfer\Method("POST")
 */
final class Create extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $licence;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options": {"min": 1, "max": 10}})
     */
    protected $privateHireLicenceNo;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options": {"min": 1, "max": 255}})
     */
    protected $councilName;

    /**
    * @Transfer\Partial("Dvsa\Olcs\Transfer\Command\Partial\AddressOptional")
    */
    protected $address;

    public function getId()
    {
        return $this->id;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function getPrivateHireLicenceNo()
    {
        return $this->privateHireLicenceNo;
    }

    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return int
     */
    public function getLicence()
    {
        return $this->licence;
    }

    public function getCouncilName()
    {
        return $this->councilName;
    }
}
