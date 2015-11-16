<?php

/**
 * Psv Discs
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query\Licence;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/licence/single/psv-discs")
 */
class PsvDiscs extends AbstractQuery implements \Dvsa\Olcs\Transfer\Query\PagedQueryInterface
{
    use Identity, \Dvsa\Olcs\Transfer\Query\PagedTraitOptional;

    /**
     * @Transfer\Filter({"name": "Zend\Filter\Boolean"})
     * @Transfer\Optional
     */
    protected $includeCeased = false;

    /**
     * @return boolean
     */
    public function getIncludeCeased()
    {
        return $this->includeCeased;
    }
}
