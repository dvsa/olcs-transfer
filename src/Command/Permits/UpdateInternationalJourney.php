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
 * @Transfer\RouteName("backend/permits/ecmt-permits-update-international-journey")
 * @Transfer\Method("PUT")
 */
final class UpdateInternationalJourney extends AbstractCommand
{
    use Identity;

    /**
     * @var string
     */
    protected $internationalJourney;

    /**
     * @return string
     */
    public function getInternationalJourney()
    {
        return $this->internationalJourney;
    }
}
