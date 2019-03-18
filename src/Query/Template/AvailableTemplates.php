<?php

/**
 * Get templates available for editing
 *
 * @author Jonathan Thomas <jonathan@opalise.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query\Template;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/template/available-templates")
 */
class AvailableTemplates extends AbstractQuery
{
}
