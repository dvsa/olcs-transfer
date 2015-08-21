<?php

/**
 * Create Unlicensed Operator Licence Vehicle
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
namespace Dvsa\Olcs\Transfer\Command\LicenceVehicle;

use Dvsa\Olcs\Transfer\FieldType\Traits\Organisation;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/operator-unlicensed/licence-vehicle")
 * @Transfer\Method("POST")
 */
final class CreateUnlicensedOperatorLicenceVehicle extends AbstractCommand
{
    use Organisation;

    /**
     * @Transfer\Filter({"name":"\Dvsa\Olcs\Transfer\Filter\Vrm"})
     * @Transfer\Validator({"name":"\Dvsa\Olcs\Transfer\Validators\Vrm"})
     * @Transfer\Optional
     */
    protected $vrm;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"vhl_t_a","vhl_t_b","vhl_t_c"}}})
     * @Transfer\Optional
     */
    protected $psvType;

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
     * Gets the value of psvType.
     *
     * @return mixed
     */
    public function getPsvType()
    {
        return $this->psvType;
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
