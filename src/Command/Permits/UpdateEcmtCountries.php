<?php

/**
 * updateEcmtCountries
 *
 * @author Scott Callaway
 */
namespace Dvsa\Olcs\Transfer\Command\Permits;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/permits/ecmt-permit-application/ecmt-restricted-countries")
 * @Transfer\Method("PUT")
 */
class UpdateEcmtCountries extends AbstractCommand
{
    /**
     * @var int
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $ecmtApplicationId;

    /**
     * @var array
     */
    protected $countryIds;

    /**
     * @return array
     */
    public function getCountryIds()
    {
        return $this->countryIds;
    }

    /**
     * @return int
     */
    public function getEcmtApplicationId()
    {
        return $this->ecmtApplicationId;
    }
}
