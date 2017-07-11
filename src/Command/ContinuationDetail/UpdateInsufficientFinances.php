<?php

namespace Dvsa\Olcs\Transfer\Command\ContinuationDetail;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\FieldType\Traits\Version;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/continuation-detail/single/insufficient-finances")
 * @Transfer\Method("PUT")
 */
final class UpdateInsufficientFinances extends AbstractCommand
{
    use Identity,
        Version;
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Boolean"})
     * @Transfer\Optional
     */
    protected $financialEvidenceUploaded;

    /**
     * @return bool
     */
    public function getFinancialEvidenceUploaded()
    {
        return $this->financialEvidenceUploaded;
    }
}
