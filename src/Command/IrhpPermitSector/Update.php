<?php

/**
 * Update IRHP Permit Sector
 */
namespace Dvsa\Olcs\Transfer\Command\IrhpPermitSector;

use Dvsa\Olcs\Transfer\FieldType\Traits\IrhpPermitStock;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/irhp-permit-sector")
 * @Transfer\Method("PUT")
 */
final class Update extends AbstractCommand
{
    use IrhpPermitStock;

    /**
     * @var array
     * @Transfer\ArrayInput
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": -1}})
     */
    protected $sectors;

    /**
     * @return array
     */
    public function getSectors(): array
    {
        return $this->sectors;
    }
}
