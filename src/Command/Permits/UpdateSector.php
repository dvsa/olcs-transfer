<?php

/**
 * Create ECMT Permit Application
 *
 * @author Tonci Vidovic <tonci.vidovic@capgemini.com>
 */
namespace Dvsa\Olcs\Transfer\Command\Permits;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/permits/ecmt-permits-update-sector")
 * @Transfer\Method("PUT")
 */
final class UpdateSector extends AbstractCommand
{
    use Identity;

    /**
     * @var int
     *
     */
    protected $sector;

    /**
     * @return int
     */
    public function getSector()
    {
        return $this->sector;
    }
}
