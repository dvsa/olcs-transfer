<?php

/**
 * Create TmQualification
 *
 * @author Alex Peshkov <alex.peshkov@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\TmQualification;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/tm-qualification/create")
 * @Transfer\Method("POST")
 */
final class Create extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name": "Zend\Filter\StringTrim"})
     * @Transfer\Validator(
     *  {
     *      "name":"Zend\Validator\InArray",
     *      "options": {
     *          "haystack": {
     *              "tm_qt_ar", "tm_qt_cpcsi", "tm_qt_cpcsn", "tm_qt_exsi", "tm_qt_exsn", "tm_qt_niar",
     *              "tm_qt_nicpcsi", "tm_qt_nicpcsn", "tm_qt_niexsi", "tm_qt_niexsn"
     *          }
     *      }
     *  }
     * )
     */
    protected $qualificationType;

    /**
     * @Transfer\Filter({"name": "Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength","options":{"min":0,"max":50}})
     * @Transfer\Optional
     */
    protected $serialNo;

    /**
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $issuedDate;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min": 1, "max": 2}})
     */
    public $countryCode;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $transportManager;

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

    public function getTransportManager()
    {
        return $this->transportManager;
    }
}
