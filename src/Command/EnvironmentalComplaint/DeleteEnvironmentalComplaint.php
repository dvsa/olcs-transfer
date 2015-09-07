<?php

namespace Dvsa\Olcs\Transfer\Command\EnvironmentalComplaint;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractDeleteCommand;

/**
 * Concrete delete class.
 *
 * @Transfer\RouteName("backend/environmental-complaint/single")
 * @Transfer\Method("DELETE")
 */
class DeleteEnvironmentalComplaint extends AbstractDeleteCommand
{
    //
}
