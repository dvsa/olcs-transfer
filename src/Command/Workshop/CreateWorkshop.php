<?php

/**
 * Create Workshops
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Workshop;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/workshop")
 * @Transfer\Method("POST")
 */
final class CreateWorkshop extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $licence;

    /**
     * @Transfer\Filter({"name": "Laminas\Filter\StringTrim"})
     * @Transfer\Filter({"name": "Laminas\Filter\StringToUpper"})
     * @Transfer\Validator({
     *     "name":"Laminas\Validator\InArray",
     *     "options": {"haystack": {"Y","N"}}
     * })
     */
    protected $isExternal;

    /**
     * @Transfer\Partial("Dvsa\Olcs\Transfer\Command\Partial\ContactDetails")
     */
    protected $contactDetails;

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
    public function getIsExternal()
    {
        return $this->isExternal;
    }

    /**
     * @return mixed
     */
    public function getContactDetails()
    {
        return $this->contactDetails;
    }
}
