<?php

/**
 * UpdateLicenceStatusRule.php
 */
namespace Dvsa\Olcs\Transfer\Command\LicenceStatusRule;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType;

/**
 * @Transfer\RouteName("backend/licence-status-rule/single")
 * @Transfer\Method("PUT")
 */
final class UpdateLicenceStatusRule extends AbstractCommand
{
    use FieldType\Traits\DecisionsOptional;

    /**
     * @var int
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $id;

    /**
     * @var int
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $licence;

    /**
     * @var int
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $version;

    /**
     * @var string
     * @Transfer\Optional
     * @Transfer\Filter({"name": "Laminas\Filter\DateTimeFormatter"})
     * @Transfer\Validator({"name": "Date", "options": {"format": \DateTime::ISO8601}})
     */
    protected $startDate;

    /**
     * @var string
     * @Transfer\Optional
     * @Transfer\Filter({"name": "Laminas\Filter\DateTimeFormatter"})
     * @Transfer\Validator({"name": "Date", "options": {"format": \DateTime::ISO8601}})
     */
    protected $endDate;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getLicence()
    {
        return $this->licence;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }
}
