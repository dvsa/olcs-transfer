<?php

/**
 * Create Application
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Application;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @src\RouteName("backend/application")
 * @src\Method("POST")
 */
final class CreateApplication extends AbstractCommand
{
    /**
     * @src\Filter({"name":"Zend\Filter\StringTrim"})
     * @src\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"lcat_gv","lcat_psv"}}})
     * @src\Optional
     */
    protected $operatorType;

    /**
     * @src\Filter({"name":"Zend\Filter\StringTrim"})
     * @src\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"ltyp_r","ltyp_sn","ltyp_si","ltyp_sr"}}})
     * @src\Optional
     */
    protected $licenceType;

    /**
     * @src\Filter({"name":"Zend\Filter\StringTrim"})
     * @src\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     * @src\Optional
     */
    protected $niFlag;

    /**
     * @todo add validators
     * @src\Optional
     */
    protected $receivedDate;

    /**
     * @todo add validators
     * @src\Optional
     */
    protected $trafficArea;

    /**
     * @src\Filter({"name":"Zend\Filter\Digits"})
     * @src\Validator({"name":"Zend\Validator\Digits"})
     * @src\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $organisation;

    /**
     * @return mixed
     */
    public function getOperatorType()
    {
        return $this->operatorType;
    }

    /**
     * @param mixed $operatorType
     */
    public function setOperatorType($operatorType)
    {
        $this->operatorType = $operatorType;
    }

    /**
     * @return mixed
     */
    public function getLicenceType()
    {
        return $this->licenceType;
    }

    /**
     * @param mixed $licenceType
     */
    public function setLicenceType($licenceType)
    {
        $this->licenceType = $licenceType;
    }

    /**
     * @return mixed
     */
    public function getNiFlag()
    {
        return $this->niFlag;
    }

    /**
     * @param mixed $niFlag
     */
    public function setNiFlag($niFlag)
    {
        $this->niFlag = $niFlag;
    }

    /**
     * @return mixed
     */
    public function getOrganisation()
    {
        return $this->organisation;
    }

    /**
     * @param mixed $organisation
     */
    public function setOrganisation($organisation)
    {
        $this->organisation = $organisation;
    }

    /**
     * @return mixed
     */
    public function getReceivedDate()
    {
        return $this->receivedDate;
    }

    /**
     * @param mixed $receivedDate
     */
    public function setReceivedDate($receivedDate)
    {
        $this->receivedDate = $receivedDate;
    }

    /**
     * @return mixed
     */
    public function getTrafficArea()
    {
        return $this->trafficArea;
    }

    /**
     * @param mixed $trafficArea
     */
    public function setTrafficArea($trafficArea)
    {
        $this->trafficArea = $trafficArea;
    }
}
