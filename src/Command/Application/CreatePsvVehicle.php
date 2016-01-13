<?php

/**
 * Create Psv Vehicle
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Application;

use Dvsa\Olcs\Transfer\FieldType\Traits\Application;
use Dvsa\Olcs\Transfer\FieldType\Traits\Vrm;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/application/named-single/psv-vehicles")
 * @Transfer\Method("POST")
 */
final class CreatePsvVehicle extends AbstractCommand
{
    use Application,
        Vrm;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength","options":{"min":2,"max":100}})
     * @Transfer\Optional
     */
    protected $makeModel;

    /**
     * @Transfer\Optional
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $receivedDate;

    /**
     * @return mixed
     */
    public function getMakeModel()
    {
        return $this->makeModel;
    }

    /**
     * @return mixed
     */
    public function getReceivedDate()
    {
        return $this->receivedDate;
    }

    /**
     * @return mixed
     */
    public function getRemovalDate()
    {
        return $this->removalDate;
    }
}
