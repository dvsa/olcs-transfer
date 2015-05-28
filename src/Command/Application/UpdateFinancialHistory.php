<?php

/**
 * Financial History
 *
 * @author Alex Peshkov <alex.peshkov@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Application;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/application/single/financial-history")
 * @Transfer\Method("PUT")
 */
final class UpdateTypeOfLicence extends AbstractCommand
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
    protected $version;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     */
    public $bankrupt = null;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     */
    protected $liquidation;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     */
    protected $receivership;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     */
    protected $administration;
    
    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     */
    protected $disqualified;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $insolvencyDetails;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Boolean"})
     * @Transfer\Optional
     */
    protected $confirm = false;

    public function getId()
    {
        return $this->id;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function getBankrupt()
    {
        return $this->bankrupt;
    }

    public function getLiquidation()
    {
        return $this->liquidation;
    }

    public function getReceivership()
    {
        return $this->receivership;
    }

    public function getAdministration()
    {
        return $this->administration;
    }

    public function getDisqualified()
    {
        return $this->disqualified;
    }

    public function getInsolvencyDetails()
    {
        return $this->insolvencyDetails;
    }

    public function getConfirm()
    {
        return $this->confirm;
    }
}
