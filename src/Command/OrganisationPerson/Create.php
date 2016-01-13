<?php

/**
 * Create OrganisationPerson
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\OrganisationPerson;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/organisation-person")
 * @Transfer\Method("POST")
 */
final class Create extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $organisation;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options": {"min": 0, "max": 45}})
     * @Transfer\Optional
     */
    protected $position;

    /**
     * @Transfer\Partial("Dvsa\Olcs\Transfer\Command\Partial\Person")
     */
    protected $person;

    public function getOrganisation()
    {
        return $this->organisation;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function getPerson()
    {
        return $this->person;
    }
}
