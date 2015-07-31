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
     * @Transfer\Validator({"name": "Digits"})
     * @Transfer\Validator({"name": "Between", "options": {"min":0, "max": 1000000}})
     * @Transfer\Optional
     */
    protected $totAuthSmallVehicles;

    /**
     * @Transfer\Validator({"name": "Digits"})
     * @Transfer\Validator({"name": "Between", "options": {"min":0, "max": 1000000}})
     * @Transfer\Optional
     */
    protected $totAuthMediumVehicles;

    /**
     * @Transfer\Validator({"name": "Digits"})
     * @Transfer\Validator({"name": "Between", "options": {"min":0, "max": 1000000}})
     * @Transfer\Optional
     */
    protected $totAuthLargeVehicles;

    /**
     * @Transfer\Validator({"name": "Digits"})
     * @Transfer\Validator({"name": "Between", "options": {"min":0, "max": 1000000}})
     * @Transfer\Optional
     */
    protected $totAuthVehicles;

    /**
     * @Transfer\Validator({"name": "Digits"})
     * @Transfer\Validator({"name": "Between", "options": {"min":0, "max": 1000000}})
     * @Transfer\Optional
     */
    protected $totAuthTrailers;

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
    public function getTotAuthSmallVehicles()
    {
        return $this->totAuthSmallVehicles;
    }

    /**
     * @return mixed
     */
    public function getTotAuthMediumVehicles()
    {
        return $this->totAuthMediumVehicles;
    }

    /**
     * @return mixed
     */
    public function getTotAuthLargeVehicles()
    {
        return $this->totAuthLargeVehicles;
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
}
