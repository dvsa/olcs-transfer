<?php

/**
 * Update TmQualification
 *
 * @author Alex Peshkov <alex.peshkov@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\TmQualification;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/tm-qualification/single")
 * @Transfer\Method("PUT")
 */
final class Update extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $id;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $version;

    /**
     * @Transfer\Filter({"name": "Laminas\Filter\StringTrim"})
     * @Transfer\Validator(
     *  {
     *      "name":"Laminas\Validator\InArray",
     *      "options": {
     *          "haystack": {
     *              "tm_qt_ar", "tm_qt_cpcsi", "tm_qt_cpcsn", "tm_qt_exsi", "tm_qt_exsn", "tm_qt_niar",
     *              "tm_qt_nicpcsi", "tm_qt_nicpcsn", "tm_qt_niexsi", "tm_qt_niexsn", "tm_qt_lgvar", "tm_qt_nilgvar"
     *          }
     *      }
     *  }
     * )
     */
    protected $qualificationType;

    /**
     * @Transfer\Filter({"name": "Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength","options":{"min":0,"max":50}})
     * @Transfer\Optional
     */
    protected $serialNo;

    /**
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $issuedDate;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength", "options":{"min": 1, "max": 2}})
     */
    public $countryCode;

    public function getId()
    {
        return $this->id;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function getQualificationType()
    {
        return $this->qualificationType;
    }

    public function getSerialNo()
    {
        return $this->serialNo;
    }

    public function getIssuedDate()
    {
        return $this->issuedDate;
    }

    public function getCountryCode()
    {
        return $this->countryCode;
    }
}
