<?php

/**
 * Upload Ebsr
 */
namespace Dvsa\Olcs\Transfer\Command\Ebsr;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldType;

/**
 * @Transfer\RouteName("backend/ebsr")
 * @Transfer\Method("POST")
 */
final class Upload extends AbstractCommand
{
    //placeholder
}
