<?php

namespace Dvsa\Olcs\Transfer\Command\GdsVerify;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/gds-verify/process-response")
 * @Transfer\Method("POST")
 */
class ProcessSignatureResponse extends AbstractCommand
{
    use \Dvsa\Olcs\Transfer\FieldType\Traits\ApplicationOptional,
        \Dvsa\Olcs\Transfer\FieldType\Traits\TransportManagerApplicationOptional;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $samlResponse;

    /**
     * @return string
     */
    public function getSamlResponse()
    {
        return $this->samlResponse;
    }
}
