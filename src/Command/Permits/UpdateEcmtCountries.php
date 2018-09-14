<?php

/**
 * updateEcmtCountries
 *
 * @author Scott Callaway
 */
namespace Dvsa\Olcs\Transfer\Command\Permits;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;

/**
 * @Transfer\RouteName("backend/permits/ecmt-permit-application/ecmt-restricted-countries")
 * @Transfer\Method("PUT")
 */
class UpdateEcmtCountries extends AbstractCommand
{
    use Identity;

    /**
     * @Transfer\ArrayInput
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\FilterEmptyItems"})
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\UniqueItems"})
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min": 1}})
     */
    protected $countryIds;

    /**
     * @return mixed
     */
    public function getCountryIds()
    {
        return $this->countryIds;
    }
}
