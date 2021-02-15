<?php

/**
 * Update Psv Vehicles
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Application;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\FieldType\Traits\Version;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/application/single/psv-vehicles")
 * @Transfer\Method("PUT")
 */
final class UpdatePsvVehicles extends AbstractCommand
{
    use Identity,
        Version;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     */
    protected $hasEnteredReg;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Boolean"})
     * @Transfer\Optional
     */
    protected $partial;

    /**
     * @return mixed
     */
    public function getHasEnteredReg()
    {
        return $this->hasEnteredReg;
    }

    /**
     * @return mixed
     */
    public function getPartial()
    {
        return $this->partial;
    }
}
