<?php

namespace Dvsa\Olcs\Transfer\Query\Fee;

use Dvsa\Olcs\Transfer\FieldType;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldTypeTraits;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\CachableMediumTermQueryInterface;

/**
 * Class FeeTypeList
 * @Transfer\RouteName("backend/fee-type")
 */
class FeeTypeList extends AbstractQuery implements FieldType\ApplicationInterface,
 FieldType\BusRegInterface,
 FieldType\LicenceInterface,
 FieldType\OrganisationInterface,
 CachableMediumTermQueryInterface
{
    // Foreign Keys
    use FieldTypeTraits\ApplicationOptional;
    use FieldTypeTraits\BusRegOptional;
    use FieldTypeTraits\LicenceOptional;
    use FieldTypeTraits\OrganisationOptional;

    /**
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\YesNo"})
     * @Transfer\Optional
     */
    protected $isMiscellaneous;

    /**
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     * @Transfer\Optional
     */
    protected $effectiveDate;

    /**
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 1}})
     * @Transfer\Optional
     */
    protected $currentFeeType;

    /**
     * @return int
     */
    public function getIsMiscellaneous()
    {
        return $this->isMiscellaneous;
    }

    /**
     * Gets the value of effectiveDate
     *
     * @return string
     */
    public function getEffectiveDate()
    {
        return $this->effectiveDate;
    }

    /**
     * Gets the value of current fee type
     *
     * @return int
     */
    public function getCurrentFeeType()
    {
        return $this->currentFeeType;
    }
}
