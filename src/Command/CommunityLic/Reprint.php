<?php

/**
 * Community Licence / Reprint
 *
 * @author Alex Peshkov <alex.peshkov@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\CommunityLic;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits\ApplicationOptional;

/**
 * @Transfer\RouteName("backend/community-lic/reprint")
 * @Transfer\Method("POST")
 */
final class Reprint extends AbstractCommand
{
    use ApplicationOptional;

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
    public $communityLicenceIds = [];

    /**
     * Get licence ID
     *
     * @return int
     */
    public function getLicence()
    {
        return $this->licence;
    }

    /**
     * Get list of community licence IDs
     *
     * @return array
     */
    public function getCommunityLicenceIds()
    {
        return $this->communityLicenceIds;
    }
}
