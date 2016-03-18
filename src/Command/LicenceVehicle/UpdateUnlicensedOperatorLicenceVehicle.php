<?php

/**
 * Update Unlicensed Operator Licence Vehicle
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
namespace Dvsa\Olcs\Transfer\Command\LicenceVehicle;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\FieldType\Traits\Version;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/operator-unlicensed/licence-vehicle/single")
 * @Transfer\Method("PUT")
 */
final class UpdateUnlicensedOperatorLicenceVehicle extends AbstractCommand
{
    use Identity,
        Version;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Optional
     */
    protected $vrm;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Between", "options": {"min": 0, "max": 999999}})
     * @Transfer\Optional
     */
    protected $platedWeight;

    /**
     * Gets the value of vrm.
     *
     * @return mixed
     */
    public function getVrm()
    {
        return $this->vrm;
    }

    /**
     * Gets the value of platedWeight.
     *
     * @return mixed
     */
    public function getPlatedWeight()
    {
        return $this->platedWeight;
    }
}
