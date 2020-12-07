<?php

/**
 * Update Safety
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Licence;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/licence/single/safety")
 * @Transfer\Method("PUT")
 */
final class UpdateSafety extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $id;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $version;

    /**
     * @Transfer\Optional
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Between", "options": {"min": 1, "max": 13}})
     */
    protected $safetyInsVehicles;

    /**
     * @Transfer\Optional
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Between", "options": {"min": 0, "max": 13}})
     */
    protected $safetyInsTrailers;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name": "Laminas\Filter\StringTrim"})
     * @Transfer\Filter({"name": "Laminas\Filter\StringToUpper"})
     * @Transfer\Validator({
     *     "name":"Laminas\Validator\InArray",
     *     "options": {"haystack": {"Y","N"}}
     * })
     */
    protected $safetyInsVaries;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name": "Laminas\Filter\StringTrim"})
     * @Transfer\Filter({"name": "Laminas\Filter\StringToLower"})
     * @Transfer\Validator({
     *     "name":"Laminas\Validator\InArray",
     *     "options": {"haystack": {"tach_internal","tach_external","tach_na"}}
     * })
     */
    protected $tachographIns;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name": "Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength", "options":{"min": 1,"max":"90"}})
     */
    protected $tachographInsName;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @return mixed
     */
    public function getSafetyInsVehicles()
    {
        return $this->safetyInsVehicles;
    }

    /**
     * @return mixed
     */
    public function getSafetyInsTrailers()
    {
        return $this->safetyInsTrailers;
    }

    /**
     * @return mixed
     */
    public function getSafetyInsVaries()
    {
        return $this->safetyInsVaries;
    }

    /**
     * @return mixed
     */
    public function getTachographIns()
    {
        return $this->tachographIns;
    }

    /**
     * @return mixed
     */
    public function getTachographInsName()
    {
        return $this->tachographInsName;
    }
}
