<?php

namespace Dvsa\Olcs\Transfer\Command\TransportManagerLicence;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @author Alex Peshkov <alex.peshkov@valtech.co.uk>
 * @Transfer\RouteName("backend/tm-responsibilities/transport-manager-licence/single")
 * @Transfer\Method("PUT")
 */
final class UpdateForResponsibilities extends AbstractCommand
{
    use Traits\Identity,
        Traits\Version;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"tm_t_i","tm_t_e"}}})
     */
    protected $tmType;

    /**
     * @Transfer\Filter({"name":"Zend\I18n\Filter\NumberFormat"})
     * @Transfer\Validator({"name":"Zend\I18n\Validator\IsFloat"})
     * @Transfer\Optional
     */
    protected $hoursMon;

    /**
     * @Transfer\Filter({"name":"Zend\I18n\Filter\NumberFormat"})
     * @Transfer\Validator({"name":"Zend\I18n\Validator\IsFloat"})
     * @Transfer\Optional
     */
    protected $hoursTue;

    /**
     * @Transfer\Filter({"name":"Zend\I18n\Filter\NumberFormat"})
     * @Transfer\Validator({"name":"Zend\I18n\Validator\IsFloat"})
     * @Transfer\Optional
     */
    protected $hoursWed;

    /**
     * @Transfer\Filter({"name":"Zend\I18n\Filter\NumberFormat"})
     * @Transfer\Validator({"name":"Zend\I18n\Validator\IsFloat"})
     * @Transfer\Optional
     */
    protected $hoursThu;

    /**
     * @Transfer\Filter({"name":"Zend\I18n\Filter\NumberFormat"})
     * @Transfer\Validator({"name":"Zend\I18n\Validator\IsFloat"})
     * @Transfer\Optional
     */
    protected $hoursFri;

    /**
     * @Transfer\Filter({"name":"Zend\I18n\Filter\NumberFormat"})
     * @Transfer\Validator({"name":"Zend\I18n\Validator\IsFloat"})
     * @Transfer\Optional
     */
    protected $hoursSat;

    /**
     * @Transfer\Filter({"name":"Zend\I18n\Filter\NumberFormat"})
     * @Transfer\Validator({"name":"Zend\I18n\Validator\IsFloat"})
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
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y","N"}}})
     */
    protected $isOwner;

    /**
     * Get  Transport Manager Application ID
     *
     * @return string
     */
    public function getTmType()
    {
        return $this->tmType;
    }

    /**
     * Hours at Monday
     *
     * @return int
     */
    public function getHoursMon()
    {
        return $this->hoursMon;
    }

    /**
     * Hours at Tuesday
     *
     * @return int
     */
    public function getHoursTue()
    {
        return $this->hoursTue;
    }

    /**
     * Hours at Wednesday
     *
     * @return int
     */
    public function getHoursWed()
    {
        return $this->hoursWed;
    }

    /**
     * Hours at Thuesday
     *
     * @return int
     */
    public function getHoursThu()
    {
        return $this->hoursThu;
    }

    /**
     * Hours at Friday
     *
     * @return int
     */
    public function getHoursFri()
    {
        return $this->hoursFri;
    }

    /**
     * Hours at Saturday
     *
     * @return int
     */
    public function getHoursSat()
    {
        return $this->hoursSat;
    }

    /**
     * Hours at Sunday
     *
     * @return int
     */
    public function getHoursSun()
    {
        return $this->hoursSun;
    }

    /**
     * Get Additional Information
     *
     * @return string
     */
    public function getAdditionalInformation()
    {
        return $this->additionalInformation;
    }

    /**
     * Is owner
     *
     * @return string
     */
    public function getIsOwner()
    {
        return $this->isOwner;
    }
}
