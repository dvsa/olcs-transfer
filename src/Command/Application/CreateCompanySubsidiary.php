<?php

/**
 * Create Company Subsidiary
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Application;

use Dvsa\Olcs\Transfer\Command\Lva\AbstractCreateCompanySubsidiary;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/application/named-single/company-subsidiary")
 * @Transfer\Method("POST")
 */
final class CreateCompanySubsidiary extends AbstractCreateCompanySubsidiary
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $application;

    /**
     * Return application idenfitier
     *
     * @return int|null
     */
    public function getApplication()
    {
        return $this->application;
    }
}
