<?php

/**
 * Type Of Licence
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Application;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/organisation/business-details/application")
 * @Transfer\Method("PUT")
 */
final class UpdateBusinessDetails extends AbstractCommand
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
    protected $licence;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $version;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min": 1}})
     */
    protected $name;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min": 1, "max": 255}})
     * @Transfer\Optional
     */
    protected $natureOfBusiness;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Optional
     */
    protected $companyOrLlpNo;

    /**
     * @Transfer\Partial("Dvsa\Olcs\Transfer\Command\Partial\RegisteredAddress")
     * @Transfer\Optional
     */
    protected $registeredAddress;

    /**
     * @Transfer\ArrayInput
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\FilterEmptyItems"})
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\UniqueItems"})
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min": 1}})
     * @Transfer\Optional
     */
    protected $tradingNames = [];

    /**
     * @Transfer\Filter({"name": "Zend\Filter\Boolean"})
     * @Transfer\Optional
     */
    protected $partial;

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
    public function getLicence()
    {
        return $this->licence;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getTradingNames()
    {
        return $this->tradingNames;
    }

    /**
     * @return mixed
     */
    public function getNatureOfBusiness()
    {
        return $this->natureOfBusiness;
    }

    /**
     * @return mixed
     */
    public function getCompanyOrLlpNo()
    {
        return $this->companyOrLlpNo;
    }

    /**
     * @return mixed
     */
    public function getRegisteredAddress()
    {
        return $this->registeredAddress;
    }

    /**
     * @return mixed
     */
    public function getPartial()
    {
        return $this->partial;
    }
}
