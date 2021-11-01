<?php

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
     * @Transfer\Filter({"name":"\Laminas\Filter\Boolean"})
     * @Transfer\Optional
     */
    protected $partial;

    /**
     * @Transfer\Filter({"name":"\Laminas\Filter\ToInt"})
     * @Transfer\Validator({"name": "Digits"})
     * @Transfer\Validator({"name": "Between", "options": {"min":0, "max": 5000}})
     * @Transfer\Optional
     */
    protected $totAuthHgvVehicles;

    /**
     * @Transfer\Filter({"name":"\Laminas\Filter\ToInt"})
     * @Transfer\Validator({"name": "Digits"})
     * @Transfer\Validator({"name": "Between", "options": {"min":0, "max": 5000}})
     * @Transfer\Optional
     */
    protected $totAuthLgvVehicles;

    /**
     * @Transfer\Filter({"name":"\Laminas\Filter\ToInt"})
     * @Transfer\Validator({"name": "Digits"})
     * @Transfer\Validator({"name": "Between", "options": {"min":0, "max": 5000}})
     * @Transfer\Optional
     */
    protected $totAuthTrailers;

    /**
     * @Transfer\Filter({"name":"\Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"\Laminas\Validator\StringLength", "options": {"min": 1, "max": "4"}})
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
    public function getTotAuthHgvVehicles()
    {
        return $this->totAuthHgvVehicles;
    }

    /**
     * @return mixed
     */
    public function getTotAuthLgvVehicles()
    {
        return $this->totAuthLgvVehicles;
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
