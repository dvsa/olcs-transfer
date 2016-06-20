<?php

/**
 * Delete one or more TaxiPhv
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Application;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/application/single/taxi-phv")
 * @Transfer\Method("DELETE")
 */
final class DeleteTaxiPhv extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $id;

    /**
     * @Transfer\ArrayInput
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $ids = [];

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

    /**
     * Application ID
     * 
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get TM Employment ID's
     *
     * @return array
     */
    public function getIds()
    {
        return $this->ids;
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
