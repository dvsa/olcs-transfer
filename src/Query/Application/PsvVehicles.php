<?php

/**
 * Psv Vehicles
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query\Application;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\Query\CachableQueryInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/application/single/psv-vehicles")
 */
class PsvVehicles extends AbstractQuery implements CachableQueryInterface
{
    use Identity;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Boolean"})
     * @Transfer\Optional
     */
    protected $includeRemoved;

    /**
     * @return mixed
     */
    public function getIncludeRemoved()
    {
        return $this->includeRemoved;
    }
}
