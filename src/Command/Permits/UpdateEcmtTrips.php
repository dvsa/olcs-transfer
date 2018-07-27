<?php

/**
 * updateEcmtTrips
 *
 * @author Andy Newton
 */
namespace Dvsa\Olcs\Transfer\Command\Permits;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/permits/ecmt-permit-application/ecmt-trips")
 * @Transfer\Method("PUT")
 */
class UpdateEcmtTrips extends AbstractCommand
{
    use Identity;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    public $trips;

    /**
     * @return int
     */
    public function getTrips()
    {
        return $this->trips;
    }
}
