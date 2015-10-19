<?php

namespace Dvsa\Olcs\Transfer\Query\Fee;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedQueryInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\PagedTraitOptional;
use Dvsa\Olcs\Transfer\Query\OrderedTraitOptional;

use Dvsa\Olcs\Transfer\FieldType;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldTypeTraits;

/**
 * Class FeeTypeList
 * @Transfer\RouteName("backend/fee-type")
 */
class FeeTypeList extends AbstractQuery implements PagedQueryInterface,
 OrderedQueryInterface,
 FieldType\ApplicationInterface,
 FieldType\LicenceInterface,
 FieldType\BusRegInterface,
 FieldType\IrfoGvPermitInterface
{
    use PagedTraitOptional;
    use OrderedTraitOptional;

    // Foreign Keys
    use FieldTypeTraits\ApplicationOptional;
    use FieldTypeTraits\LicenceOptional;
    use FieldTypeTraits\BusRegOptional;
    use FieldTypeTraits\IrfoGvPermitOptional;

    /**
     * @Transfer\Optional
     */
    protected $isMiscellaneous;

    /**
     * @return int
     */
    public function getIsMiscellaneous()
    {
        return $this->isMiscellaneous;
    }
}
