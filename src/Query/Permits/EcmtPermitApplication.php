<?php

/**
 * ECMT Applications
 *
 * @author Tonci Vidovic <tonci.vidovic@capgemini.com>
 */
namespace Dvsa\Olcs\Transfer\Query\Permits;

use Dvsa\Olcs\Transfer\Query\OrderedTraitOptional;

use Dvsa\Olcs\Transfer\Query\CachableShortTermQueryInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/permits/ecmt-permit-application")
 */
class EcmtPermitApplication extends AbstractQuery implements CachableShortTermQueryInterface
{
    use OrderedTraitOptional;

    /**
      @var string
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min": 1}})
     */
    protected $organisationId;

    /**
     * @return int
     */
    public function getOrganisationId()
    {
        return $this->organisationId;
    }
}
