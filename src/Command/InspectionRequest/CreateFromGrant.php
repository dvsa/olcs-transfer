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
 * @Transfer\RouteName("backend/inspection-request/create-from-grant")
 * @Transfer\Method("POST")
 */
final class CreateFromGrant extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    public $application;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\InArray", "options": {"haystack": {"3", "6", "9", "12"}}})
     */
    public $duePeriod;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name": "Laminas\Filter\StringTrim"})
     */
    protected $caseworkerNotes;

    public function getApplication()
    {
        return $this->application;
    }

    public function getDuePeriod()
    {
        return $this->duePeriod;
    }

    public function getCaseworkerNotes()
    {
        return $this->caseworkerNotes;
    }
}
