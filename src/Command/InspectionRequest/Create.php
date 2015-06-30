<?php

/**
 * Create Inspection Request
 *
 * @author Alex Peshkov <alex.peshkov@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\InspectionRequest;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/inspection-request/create")
 * @Transfer\Method("POST")
 */
final class Create extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    public $licence;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    public $application;

    /**
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     * @Transfer\Optional
     */
    protected $dueDate;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator(
     *   {"name":"Zend\Validator\InArray", "options": {"haystack": {"application", "applicationFromGrant", "licence"}}}
     * )
     * @Transfer\Optional
     */
    public $type;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name": "Zend\Filter\StringTrim"})
     */
    protected $caseworkerNotes;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name": "Zend\Filter\StringTrim"})
     */
    protected $reportType;
    
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    public $operatingCentre;
    
/*
                'reportType' => $inspectionRequest['reportType']['id'],
                'operatingCentre' => $inspectionRequest['operatingCentre']['id'],
                'inspectorName' => $inspectionRequest['inspectorName'],
                'requestType' => $inspectionRequest['requestType']['id'],
                'requestDate' => $inspectionRequest['requestDate'],
                'dueDate' => $inspectionRequest['dueDate'],
                'returnDate' => $inspectionRequest['returnDate'],
                'resultType' => $inspectionRequest['resultType']['id'],
                'fromDate' => $inspectionRequest['fromDate'],
                'toDate' => $inspectionRequest['toDate'],
                'vehiclesExaminedNo' => $inspectionRequest['vehiclesExaminedNo'],
                'trailersExaminedNo' => $inspectionRequest['trailersExaminedNo'],
                'requestorNotes' => $inspectionRequest['requestorNotes'],
                'inspectorNotes' => $inspectionRequest['inspectorNotes']    
  */

    public function getLicence()
    {
        return $this->licence;
    }

    public function getApplication()
    {
        return $this->application;
    }

    public function getDueDate()
    {
        return $this->dueDate;
    }

    public function getType()
    {
        return $this->type;
    }
}
