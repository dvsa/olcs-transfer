<?php

namespace Dvsa\Olcs\Transfer\Command\Permits;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType as FieldType;

/**
 * @Transfer\RouteName("backend/permits/ecmt-permit-application/store-application-snapshot")
 * @Transfer\Method("POST")
 */
final class StoreEcmtPermitApplicationSnapshot extends AbstractCommand
{
    use FieldType\Traits\Identity;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Escape(false)
     */
    protected $html;

    /**
     * Get the HTML content
     *
     * @return string
     */
    public function getHtml()
    {
        return $this->html;
    }
}
