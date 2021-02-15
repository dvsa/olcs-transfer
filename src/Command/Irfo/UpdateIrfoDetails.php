<?php

/**
 * Update IrfoDetails
 */
namespace Dvsa\Olcs\Transfer\Command\Irfo;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/irfo/single")
 * @Transfer\Method("PUT")
 */
final class UpdateIrfoDetails extends AbstractCommand
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
     * @Transfer\ArrayInput
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\FilterEmptyItems"})
     * @Transfer\Partial("Dvsa\Olcs\Transfer\Command\Partial\TradingName")
     * @Transfer\Optional
     */
    protected $tradingNames = [];

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength", "options":{"min":2, "max":2}})
     * @Transfer\Optional
     */
    protected $irfoNationality;

    /**
     * @Transfer\ArrayInput
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\FilterEmptyItems"})
     * @Transfer\Partial("Dvsa\Olcs\Transfer\Command\Partial\IrfoPartner")
     * @Transfer\Optional
     */
    protected $irfoPartners = [];

    /**
     * @Transfer\Partial("Dvsa\Olcs\Transfer\Command\Partial\ContactDetails")
     * @Transfer\Optional
     */
    protected $irfoContactDetails;

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
    public function getTradingNames()
    {
        return $this->tradingNames;
    }

    /**
     * @return mixed
     */
    public function getIrfoNationality()
    {
        return $this->irfoNationality;
    }

    /**
     * @return mixed
     */
    public function getIrfoPartners()
    {
        return $this->irfoPartners;
    }

    /**
     * @return mixed
     */
    public function getIrfoContactDetails()
    {
        return $this->irfoContactDetails;
    }
}
