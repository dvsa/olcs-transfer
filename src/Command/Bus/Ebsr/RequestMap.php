<?php

namespace Dvsa\Olcs\Transfer\Command\Bus\Ebsr;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * RequestMap
 *
 * @Transfer\RouteName("backend/bus/single/request-map")
 * @Transfer\Method("POST")
 */
class RequestMap extends AbstractCommand
{
    use Identity;

    /**
     * @var string
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"small","large"}}})
     */
    protected $scale;

    /**
     * @return string
     */
    public function getScale()
    {
        return $this->scale;
    }
}
