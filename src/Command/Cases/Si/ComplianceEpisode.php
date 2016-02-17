<?php

namespace Dvsa\Olcs\Transfer\Command\Cases\Si;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldType;

/**
 * @Transfer\RouteName("backend/si/compliance-episode")
 * @Transfer\Method("POST")
 */
class ComplianceEpisode extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $xml;

    /**
     * @return string
     */
    public function getXml()
    {
        return $this->xml;
    }
}
