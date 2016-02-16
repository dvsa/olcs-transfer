<?php

/**
 * Create Operator
 *
 * @author Alex Peshkov <alex.peshkov@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Operator;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/operator")
 * @Transfer\Method("POST")
 */
final class Create extends AbstractCommand
{
    /**
     * @Transfer\Optional
     * @Transfer\Validator({
     *     "name":"Zend\Validator\InArray",
     *     "options": {"haystack": {"op_cpid_central","op_cpid_local","op_cpid_corporation","op_cpid_default"}}
     * })
     */
    protected $cpid;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *     "name":"Zend\Validator\InArray",
     *     "options": {"haystack": {"org_t_p","org_t_pa","org_t_rc","org_t_llp","org_t_st","org_t_ir"}}
     * })
     */
    protected $businessType;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options": {"min": 1, "max": 8}})
     * @Transfer\Validator({"name":"Zend\I18n\Validator\Alnum"})
     * @Transfer\Optional
     */
    protected $companyNumber;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\NotEmpty"})
     * @Transfer\Optional
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
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min": 1, "max": 35}})
     * @Transfer\Optional
     */
    protected $firstName;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min": 1, "max": 35}})
     * @Transfer\Optional
     */
    protected $lastName;

    /**
     * @Transfer\Partial("Dvsa\Olcs\Transfer\Command\Partial\RegisteredAddress")
     * @Transfer\Optional
     */
    protected $address;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Optional
     */
    protected $isIrfo;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Optional
     */
    protected $allowEmail;

    /**
     * @return mixed
     */
    public function getCpid()
    {
        return $this->cpid;
    }

    /**
     * @return mixed
     */
    public function getBusinessType()
    {
        return $this->businessType;
    }

    /**
     * @return mixed
     */
    public function getCompanyNumber()
    {
        return $this->companyNumber;
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
    public function getNatureOfBusiness()
    {
        return $this->natureOfBusiness;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
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
    public function getIsIrfo()
    {
        return $this->isIrfo;
    }

    /**
     * @return mixed
     */
    public function getAllowEmail()
    {
        return $this->allowEmail;
    }
}
