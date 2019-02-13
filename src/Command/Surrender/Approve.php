<?php


namespace Dvsa\Olcs\Transfer\Command\Surrender;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;

/**
 * @Transfer\RouteName("backend/licence/single/surrender/approve")
 * @Transfer\Method("POST")
 */
class Approve extends AbstractCommand
{
    use Identity;
}
