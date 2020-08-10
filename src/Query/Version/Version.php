<?php

namespace Dvsa\Olcs\Transfer\Query\Version;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * Class VenueList
 * @Transfer\RouteName("backend/version")
 */
class Version extends AbstractQuery
{
    /**
     * @Transfer\String
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":1000}})
     */
    protected $version;

    public function getVersion()
    {
        return $this->version;
    }
}