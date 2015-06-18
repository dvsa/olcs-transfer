<?php

/**
 * Update a Person
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Person;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/person/single")
 * @Transfer\Method("PUT")
 */
final class Update extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $id;

    /**
     * @Transfer\Optional
     * @Transfer\Validator({"name":"Zend\Validator\Date", "options": {"format": "Y-m-d"}})
     */
    protected $dob;

    /**
     * Get Person ID
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get date of birth
     *
     * @return string
     */
    public function getDob()
    {
        return $this->dob;
    }
}
