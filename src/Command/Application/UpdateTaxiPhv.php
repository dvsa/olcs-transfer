<?php

/**
 * Update TaxiPhv
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Application;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/application/single/taxi-phv/single")
 * @Transfer\Method("PUT")
 */
final class UpdateTaxiPhv extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $id;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $privateHireLicence;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $version;

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

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $licence;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *     "name":"Zend\Validator\InArray",
     *     "options": {"haystack": {"application","variation","licence"}}
     * })
     * @Transfer\Optional
     */
    protected $lva;

    public function getId()
    {
        return $this->id;
    }

    public function getPrivateHireLicence()
    {
        return $this->privateHireLicence;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function getPrivateHireLicenceNo()
    {
        return $this->privateHireLicenceNo;
    }

    public function getCouncilName()
    {
        return $this->councilName;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getLicence()
    {
        return $this->licence;
    }

    public function getLva()
    {
        return $this->lva;
    }
}
