<?php

/**
 * Community Licence / Void
 *
 * @author Alex Peshkov <alex.peshkov@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\CommunityLic;

use Dvsa\Olcs\Transfer\FieldType\Traits\ApplicationOptional;
use Dvsa\Olcs\Transfer\FieldType\Traits\Licence;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/community-lic/void")
 * @Transfer\Method("POST")
 */
final class Void extends AbstractCommand
{
    use ApplicationOptional,
        Licence;

    /**
     * @Transfer\ArrayInput
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    public $communityLicenceIds = [];

    /**
     * @Transfer\Optional
     */
    public $checkOfficeCopy;

    public function getCommunityLicenceIds()
    {
        return $this->communityLicenceIds;
    }

    public function getCheckOfficeCopy()
    {
        return $this->checkOfficeCopy;
    }
}
