<?php

/**
 * SeriousInfringement
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query\Cases\Si;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/si")
 */
class GetList extends AbstractQuery
{
    use \Dvsa\Olcs\Transfer\FieldType\Traits\Cases;
}
