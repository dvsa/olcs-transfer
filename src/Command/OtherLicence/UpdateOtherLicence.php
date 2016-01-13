<?php

/**
 * Update Other Licence
 *
 * @author Alex Peshkov <alex.peshkov@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\OtherLicence;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/other-licence/single")
 * @Transfer\Method("PUT")
 */
final class UpdateOtherLicence extends AbstractCommand
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
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    public $licNo;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    public $holderName;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     * @Transfer\Optional
     */
    public $willSurrender;

    /**
     * @Transfer\Validator({"name":"Date","options":{"format":"Y-m-d"}})
     * @Transfer\Optional
     */
    public $disqualificationDate;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Optional
     */
    public $disqualificationLength;

    /**
     * @Transfer\Validator({"name":"Date","options":{"format":"Y-m-d"}})
     * @Transfer\Optional
     */
    public $purchaseDate;

    public function getId()
    {
        return $this->id;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function getLicNo()
    {
        return $this->licNo;
    }

    public function getHolderName()
    {
        return $this->holderName;
    }

    public function getWillSurrender()
    {
        return $this->willSurrender;
    }

    public function getDisqualificationDate()
    {
        return $this->disqualificationDate;
    }

    public function getDisqualificationLength()
    {
        return $this->disqualificationLength;
    }

    public function getPurchaseDate()
    {
        return $this->purchaseDate;
    }
}
