<?php

/**
 * Create Operating Centre
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Licence;

use Dvsa\Olcs\Transfer\Command\ApplicationOperatingCentre\AbstractOcCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits\Licence;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/licence/named-single/operating-centre")
 * @Transfer\Method("POST")
 */
final class CreateOperatingCentre extends AbstractOcCommand
{
    use Licence;
}