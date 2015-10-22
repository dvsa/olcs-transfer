<?php

namespace Dvsa\Olcs\Transfer\Query\Fee;

use Dvsa\Olcs\Transfer\FieldType;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldTypeTraits;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\CachableQueryInterface;
use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedQueryInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * Class FeeTypeList
 * @Transfer\RouteName("backend/fee-type")
 */
class FeeTypeList extends AbstractQuery implements FieldType\ApplicationInterface,
 FieldType\BusRegInterface,
 FieldType\IrfoGvPermitInterface,
 FieldType\LicenceInterface,
 FieldType\OrganisationInterface,
 CachableQueryInterface
{
    // Foreign Keys
    use FieldTypeTraits\ApplicationOptional;
    use FieldTypeTraits\BusRegOptional;
    use FieldTypeTraits\IrfoGvPermitOptional;
    use FieldTypeTraits\LicenceOptional;
    use FieldTypeTraits\OrganisationOptional;

    /**
     * @Transfer\Optional
     */
    protected $isMiscellaneous;

    /**
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     * @Transfer\Optional
     */
    protected $effectiveDate;

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
}
