<?php


namespace Dvsa\Olcs\Transfer\Query\Surrender;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * Class GetStatus
 *
 * @package Dvsa\Olcs\Transfer\Query\Surrender
 * @Transfer\RouteName("backend/licence/single/surrender/status")
 * @Transfer\Method("GET")
 */
class GetStatus extends AbstractQuery
{
    use Identity;
}
