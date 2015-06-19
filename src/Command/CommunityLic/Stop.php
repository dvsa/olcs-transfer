<?php

/**
 * Community Licence / Stop
 *
 * @author Alex Peshkov <alex.peshkov@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\CommunityLic;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/community-lic/stop")
 * @Transfer\Method("POST")
 */
final class Stop extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    public $licence;

    /**
     * @Transfer\ArrayInput
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    public $communityLicenceIds;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"withdrawal", "suspension"}}})
     */
    public $type;

    /**
     * @Transfer\Optional
     */
    protected $startDate;

    /**
     * @Transfer\Optional
     */
    protected $endDate;

    /**
     * @Transfer\ArrayInput
     * @Transfer\ArrayValidator({"name":"Zend\Validator\NotEmpty"})
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\FilterEmptyItems"})
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\UniqueItems"})
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    public $reasons;

    public function getLicence()
    {
        return $this->licence;
    }

    public function getCommunityLicenceIds()
    {
        return $this->communityLicenceIds;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getStartDate()
    {
        return $this->startDate;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }

    public function getReasons()
    {
        return $this->reasons;
    }
}
