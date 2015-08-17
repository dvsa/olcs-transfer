<?php

/**
 * Grant Variation
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Variation;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/variation/single/grant")
 * @Transfer\Method("PUT")
 */
final class Grant extends AbstractCommand
{
    use Identity;
}