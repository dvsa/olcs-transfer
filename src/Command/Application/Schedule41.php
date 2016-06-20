<?php

/**
 * Schedule41.php
 *
 * @author Joshua Curtis <josh.curtis@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Application;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits\Licence;

/**
 * @Transfer\RouteName("backend/application/single/schedule-41")
 * @Transfer\Method("PUT")
 */
final class Schedule41 extends AbstractCommand
{
    use Identity,
        Licence;

    /**
     * @Transfer\ArrayInput
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $operatingCentres = [];

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\YesNo"})
     * @Transfer\Optional
     */
    protected $surrenderLicence;

    /**
     * @return mixed
     */
    public function getOperatingCentres()
    {
        return $this->operatingCentres;
    }

    /**
     * @return mixed
     */
    public function getSurrenderLicence()
    {
        return $this->surrenderLicence;
    }
}
