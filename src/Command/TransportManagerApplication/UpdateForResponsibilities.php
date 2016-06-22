<?php

/**
 * UpdateForResponsibilities Transport Manager Application
 *
 * @author Alex Peshkov <alex.peshkov@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\TransportManagerApplication;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/tm-responsibilities/transport-manager-application/single")
 * @Transfer\Method("PUT")
 */
final class UpdateForResponsibilities extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $id;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $version;

    /**
     * @Transfer\ArrayInput
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $operatingCentres = [];

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"tm_t_i","tm_t_e"}}})
     * @Transfer\Optional
     */
    protected $tmType;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y","N"}}})
     */
    protected $isOwner;

    /**
     * @Transfer\Filter({"name":"Zend\I18n\Filter\NumberFormat"})
     * @Transfer\Validator({"name":"Zend\I18n\Validator\Float"})
     * @Transfer\Optional
     */
    protected $hoursMon;

    /**
     * @Transfer\Filter({"name":"Zend\I18n\Filter\NumberFormat"})
     * @Transfer\Validator({"name":"Zend\I18n\Validator\Float"})
     * @Transfer\Optional
     */
    protected $hoursTue;

    /**
     * @Transfer\Filter({"name":"Zend\I18n\Filter\NumberFormat"})
     * @Transfer\Validator({"name":"Zend\I18n\Validator\Float"})
     * @Transfer\Optional
     */
    protected $hoursWed;

    /**
     * @Transfer\Filter({"name":"Zend\I18n\Filter\NumberFormat"})
     * @Transfer\Validator({"name":"Zend\I18n\Validator\Float"})
     * @Transfer\Optional
     */
    protected $hoursThu;

    /**
     * @Transfer\Filter({"name":"Zend\I18n\Filter\NumberFormat"})
     * @Transfer\Validator({"name":"Zend\I18n\Validator\Float"})
     * @Transfer\Optional
     */
    protected $hoursFri;

    /**
     * @Transfer\Filter({"name":"Zend\I18n\Filter\NumberFormat"})
     * @Transfer\Validator({"name":"Zend\I18n\Validator\Float"})
     * @Transfer\Optional
     */
    protected $hoursSat;

    /**
     * @Transfer\Filter({"name":"Zend\I18n\Filter\NumberFormat"})
     * @Transfer\Validator({"name":"Zend\I18n\Validator\Float"})
     * @Transfer\Optional
     */
    protected $hoursSun;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Optional
     */
    protected $additionalInformation;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator(
     *  {
     *      "name":"Zend\Validator\InArray",
     *      "options": {
     *          "haystack": {
     *              "tmap_st_awaiting_signature", "tmap_st_incomplete", "tmap_st_operator_signed",
     *              "tmap_st_postal_application", "tmap_st_received", "tmap_st_tm_signed"
     *          }
     *      }
     *  }
     * )
     */
    protected $tmApplicationStatus;

    /**
     * Get Transport Manager Application ID
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @return array
     */
    public function getOperatingCentres()
    {
        return $this->operatingCentres;
    }

    /**
     * @return string
     */
    public function getTmType()
    {
        return $this->tmType;
    }

    /**
     * @return string
     */
    public function getIsOwner()
    {
        return $this->isOwner;
    }

    /**
     * @return int
     */
    public function getHoursMon()
    {
        return $this->hoursMon;
    }

    /**
     * @return int
     */
    public function getHoursTue()
    {
        return $this->hoursTue;
    }

    /**
     * @return int
     */
    public function getHoursWed()
    {
        return $this->hoursWed;
    }

    /**
     * @return int
     */
    public function getHoursThu()
    {
        return $this->hoursThu;
    }

    /**
     * @return int
     */
    public function getHoursFri()
    {
        return $this->hoursFri;
    }

    /**
     * @return int
     */
    public function getHoursSat()
    {
        return $this->hoursSat;
    }

    /**
     * @return int
     */
    public function getHoursSun()
    {
        return $this->hoursSun;
    }

    /**
     * @return string
     */
    public function getAdditionalInformation()
    {
        return $this->additionalInformation;
    }

    /**
     * @return string
     */
    public function getTmApplicationStatus()
    {
        return $this->tmApplicationStatus;
    }
}
