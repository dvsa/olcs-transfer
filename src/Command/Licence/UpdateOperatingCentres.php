<?php

/**
 * Update Operating Centres
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Licence;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\FieldType\Traits\Version;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/licence/single/operating-centres")
 * @Transfer\Method("PUT")
 */
final class UpdateOperatingCentres extends AbstractCommand
{
    use Identity,
        Version;

    /**
     * @Transfer\Filter({"name":"\Zend\Filter\Boolean"})
     * @Transfer\Optional
     */
    protected $partial;

    /**
     * @Transfer\Filter({"name":"\Zend\Filter\ToInt"})
     * @Transfer\Validator({"name": "Digits"})
     * @Transfer\Validator({"name": "Between", "options": {"min":0, "max": 1000000}})
     * @Transfer\Optional
     */
    protected $totAuthVehicles;

    /**
     * @Transfer\Filter({"name":"\Zend\Filter\ToInt"})
     * @Transfer\Validator({"name": "Digits"})
     * @Transfer\Validator({"name": "Between", "options": {"min":0, "max": 1000000}})
     * @Transfer\Optional
     */
    protected $totAuthTrailers;

    /**
     * @Transfer\Filter({"name":"\Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"\Zend\Validator\StringLength", "options": {"min": 1, "max": "4"}})
     * @Transfer\Optional
     */
    protected $enforcementArea;

    /**
     * @return mixed
     */
    public function getPartial()
    {
        return $this->partial;
    }

    /**
     * @return mixed
     */
    public function getTotAuthVehicles()
    {
        return $this->totAuthVehicles;
    }

    /**
     * @return mixed
     */
    public function getTotAuthTrailers()
    {
        return $this->totAuthTrailers;
    }

    /**
     * @return mixed
     */
    public function getEnforcementArea()
    {
        return $this->enforcementArea;
    }
}
