<?php

/**
 * Update Goods Vehicle
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Vehicle;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\FieldType\Traits\Version;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/licence-vehicle/single")
 * @Transfer\Method("PUT")
 */
final class UpdateGoodsVehicle extends AbstractCommand
{
    use Identity,
        Version;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Between", "options": {"min": 0, "max": 999999}})
     */
    protected $platedWeight;

    /**
     * @Transfer\Optional
     */
    protected $receivedDate;

    /**
     * @Transfer\Optional
     */
    protected $specifiedDate;

    /**
     * @return mixed
     */
    public function getPlatedWeight()
    {
        return $this->platedWeight;
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
    public function getSpecifiedDate()
    {
        return $this->specifiedDate;
    }
}
