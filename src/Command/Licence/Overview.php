<?php

/**
 * Overview
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
namespace Dvsa\Olcs\Transfer\Command\Licence;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/licence/single/overview")
 * @Transfer\Method("PUT")
 */
final class Overview extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $id;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $version;

    /**
     * @Transfer\Optional
     */
    protected $leadTcArea;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $reviewDate;

    /**
     * @Transfer\Optional()
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $expiryDate;

    /**
     * @Transfer\Optional()
     * @Transfer\Filter({"name": "Zend\Filter\StringTrim"})
     * @Transfer\Filter({"name": "Zend\Filter\StringToUpper"})
     * @Transfer\Validator({
     *     "name":"Zend\Validator\InArray",
     *     "options": {"haystack": {"Y","N"}}
     * })
     */
    protected $translateToWelsh;

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Gets the value of version.
     *
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Gets the value of leadTcArea.
     *
     * @return mixed
     */
    public function getLeadTcArea()
    {
        return $this->leadTcArea;
    }

    /**
     * Gets the value of reviewDate.
     *
     * @return mixed
     */
    public function getReviewDate()
    {
        return $this->reviewDate;
    }

    /**
     * Gets the value of expiryDate.
     *
     * @return mixed
     */
    public function getExpiryDate()
    {
        return $this->expiryDate;
    }

    /**
     * Gets the value of translateToWelsh.
     *
     * @return mixed
     */
    public function getTranslateToWelsh()
    {
        return $this->translateToWelsh;
    }
}
