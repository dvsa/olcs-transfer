<?php

namespace Dvsa\Olcs\Transfer\Command\Application;

use Dvsa\Olcs\Transfer\Command\AbstractSaveBusinessDetails;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/organisation/business-details/application")
 * @Transfer\Method("PUT")
 */
final class UpdateBusinessDetails extends AbstractSaveBusinessDetails
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $licence;

    /**
     * Get licence id
     *
     * @return int
     */
    public function getLicence()
    {
        return $this->licence;
    }
}
