<?php

namespace Dvsa\Olcs\Transfer\Command\Application;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\FieldType\Traits\Version;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/application/single/vehicle-size")
 * @Transfer\Method("PUT")
 */
final class UpdateVehicleSize extends AbstractCommand
{
    use Identity;
    use Version;

    /**
     * @Transfer\Filter("Laminas\Filter\StringTrim")
     * @Transfer\Validator("Laminas\Validator\InArray", options={"haystack": {"psvvs_small", "psvvs_medium_large", "psvvs_both"}})
     */
    protected $psvVehicleSize;

    public function getPsvVehicleSize()
    {
        return $this->psvVehicleSize;
    }
}
